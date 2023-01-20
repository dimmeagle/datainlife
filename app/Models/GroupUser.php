<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class GroupUser extends Pivot
{
    protected $table = 'group_user';
    protected $fillable = [
        'user_id',
        'group_id',
        'expired_at'];
    protected $casts = [
        'expired_at' => 'datetime',
    ];
    public $timestamps = true;




}
