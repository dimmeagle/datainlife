<?php

namespace App\Http\Controllers;

use App\Models\GroupUser;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class GroupUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($groupID = 0, $userID = 0)
    {

        $groupUser = new GroupUser;
        $groupUser->user_id = $userID;
        $groupUser->group_id = $groupID;
        $groupUser->save();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GroupUser  $groupUser
     * @return \Illuminate\Http\Response
     */
    public function show(GroupUser $groupUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GroupUser  $groupUser
     * @return \Illuminate\Http\Response
     */
    public function edit(GroupUser $groupUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GroupUser  $groupUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GroupUser $groupUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GroupUser  $groupUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(GroupUser $groupUser)
    {
        //
    }
}
