<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function getAtUsernameAttribute() {
        return '@' . $this->username;
    }

    public function getProfileUrlAttribute() {
        return url($this->at_username);
    }

    // Current user's tweets
    public function tweets() {
        return $this->hasMany(Tweet::class);
    }

    /**
     * Users that follow the current user's model
     */
    public function followers()
    {
        return $this->belongsToMany(self::class, 'followings', 'followed_user_id', 'follower_user_id')
            ->using(FollowingPivot::class)
            ->withTimestamps();
    }

    /**
     * Users that the current user's model follows
     */
    public function following()
    {
        return $this->belongsToMany(self::class, 'followings', 'follower_user_id', 'followed_user_id')
            ->using(FollowingPivot::class)
            ->withTimestamps();
    }

    public function addFollower()
    {
        $this->n_follower++;
        $this->save();
    }

    public function addFollowed()
    {
        $this->n_followed++;
        $this->save();
    }

    public function subFollower()
    {
        $this->n_follower--;
        $this->save();
    }

    public function subFollowed()
    {
        $this->n_followed--;
        $this->save();
    }


    protected static function boot()
    {
        // Boot other traits on the Model
        parent::boot();

        /**
         * Listen for the 'creating' event on the Track Model.
         */
        static::creating(function ($model) {
            $model->setAttribute('uuid', Str::uuid()->toString());
        });
    }
}