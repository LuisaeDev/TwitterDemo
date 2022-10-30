<?php

namespace App\Contracts;

use App\Models\User;
use Illuminate\Contracts\Pagination\Paginator;

interface FollowInterface
{
    public function followers(User $user): Paginator;
    public function following(User $user): Paginator;
    public function follow(User $followerUser, User $followedUser): void;
    public function unfollow(User $followerUser, User $followedUser): void;
}