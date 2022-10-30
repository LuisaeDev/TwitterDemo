<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class FollowingPivot extends Pivot
{
    use HasFactory;

    protected $table = 'followings';

    protected $fillable = ['user_id', 'follow_user_id'];

    public function follower()
    {
        return $this->belongsTo(User::class, 'id', 'follower_user_id');
    }

    public function followed()
    {
        return $this->belongsTo(User::class, 'id', 'followed_user_id');
    }
}
