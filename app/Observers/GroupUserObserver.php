<?php

namespace App\Observers;

use App\Models\GroupUser;
use App\Models\Group;
use Illuminate\Support\Facades\DB;

class GroupUserObserver
{
    public $afterCommit = true;

    /**
     * Handle the GroupUser "created" event.
     *
     * @param  \App\Models\GroupUser  $groupUser
     * @return void
     */
    public function created(GroupUser $groupUser)
    {
        DB::table('group_user')
            ->where('user_id',$groupUser->user_id)
            ->where('group_id', $groupUser->group_id)
            ->update(['expired_at' => now()->addHours(Group::find($groupUser->group_id)->expire_hours)]);
    }

    /**
     * Handle the GroupUser "updated" event.
     *
     * @param  \App\Models\GroupUser  $groupUser
     * @return void
     */
    public function updated(GroupUser $groupUser)
    {
        //
    }

    /**
     * Handle the GroupUser "deleted" event.
     *
     * @param  \App\Models\GroupUser  $groupUser
     * @return void
     */
    public function deleted(GroupUser $groupUser)
    {
        //
    }

    /**
     * Handle the GroupUser "restored" event.
     *
     * @param  \App\Models\GroupUser  $groupUser
     * @return void
     */
    public function restored(GroupUser $groupUser)
    {
        //
    }

    /**
     * Handle the GroupUser "force deleted" event.
     *
     * @param  \App\Models\GroupUser  $groupUser
     * @return void
     */
    public function forceDeleted(GroupUser $groupUser)
    {
        //
    }
}
