<?php

namespace App\Console\Commands;

use App\Mail\GroupExpireMail;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Model;
use App\Models\GroupUser;
use Illuminate\Support\Facades\Mail;
use App\Models\Group;
use App\Models\User;
use App\Jobs\ProcessUserDeactivate;

class UserCheckExpiration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:check_expiration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checking users with expired group participation';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if (GroupUser::where('expired_at', '<', now())->count() > 0) {
            $expiredUsers = GroupUser::where('expired_at', '<', now())->get();
            GroupUser::where('expired_at', '<', now())->delete();
            foreach ($expiredUsers as $groupUser) {
                $group = Group::find($groupUser->group_id);
                $user = User::find($groupUser->user_id);
                Mail::to($user->email)->send(new GroupExpireMail($group, $user));
                ProcessUserDeactivate::dispatch($user);
            }
        }

        return Command::SUCCESS;
    }
}
