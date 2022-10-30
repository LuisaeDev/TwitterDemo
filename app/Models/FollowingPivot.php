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
        return $this->belongsTo(User::class, 'follower_user_id', 'id');
    }

    public function followed()
    {
        return $this->belongsTo(User::class, 'followed_user_id', 'id');
    }

    public static function boot()
    {
        // Boot other traits on the Model
        parent::boot();

        /**
         * Listen for the 'created' event on the Track Model.
         */
        static::created(function ($model) {
            $model->follower->addFollower();
            $model->followed->addFollowed();
        });

        /**
         * Listen for the 'deleted' event on the Track Model.
         */
        static::deleted(function ($model) {
            $model->follower->subFollower();
            $model->followed->subFollowed();
        });
    }
}
