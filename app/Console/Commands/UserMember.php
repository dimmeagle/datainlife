<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\GroupUser;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserMember extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:member';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adding user to a group';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $userID = $this->ask('User ID: ');
        $groupID = $this->ask('Group ID: ');
        if (GroupUser::where('user_id', $userID)->where('group_id', $groupID)->count() == 0) {
            GroupUser::create(['user_id' => $userID, 'group_id' => $groupID]);
        }
        $user = User::find($userID);
        if (!$user->active) {
            $user->active = true;
            $user->save();
        }

        echo 'Operation completed successfully successfully';
        return Command::SUCCESS;
    }
}
