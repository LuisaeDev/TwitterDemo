<?php

namespace App\Repositories;

use App\Models\User;
use App\Contracts\FollowInterface;
use App\Exceptions\FollowException;
use App\Models\FollowingPivot;
use Illuminate\Contracts\Pagination\Paginator;

class FollowRepository implements FollowInterface
{

    /**
     * Return followers for a specific user.
     *
     * @param User $user
     * @return array
     */
    public function followers(User $user): Paginator
    {
        
        // Obtain user's followers
        $followers = $user->followers();

        // Return paginated data
        return $followers->paginate();
    }

    /**
     * Return following users for a specific user.
     *
     * @param User $user
     * @return array
     */
    public function following(User $user): Paginator
    {
        
        // Obtain user's following
        $following = $user->following();

        // Return paginated data
        return $following->paginate(config('twitter.followers.paginate_per_page'));
    }

    /**
     * Set a following relation.
     *
     * @param User $followerUser
     * @param User $followedUser
     * @return void
     */
    public function follow(User $followerUser, User $followedUser): void
    {

        // Check if the followed and follower are the same
        if ($followerUser->id == $followedUser->id) {
            throw new FollowException('invalid-follow');
        }

        // Check if the following relation does not exists, for prevent referential integrity error
        if (!$this->isFollowing($followerUser, $followedUser)) {
            $followerUser->following()->attach($followedUser->id);
        }
    }

    /**
     * Remove a following relation.
     *
     * @param User $followerUser
     * @param User $followedUser
     * @return void
     */
    public function unfollow(User $followerUser, User $followedUser): void
    {
        // Check if the followed and follower are the same
        if ($followerUser->id == $followedUser->id) {
            throw new FollowException('invalid-follow');
        } else {
            $followerUser->following()->detach($followedUser->id);
        }
    }

    /**
     * Check if a following relation exists.
     *
     * @param User $followerUser
     * @param User $followedUser
     * @return boolean
     */
    private function isFollowing(User $followerUser, User $followedUser): bool
    {
        $exists = FollowingPivot::query()
            ->where('follower_user_id', $followerUser->id)
            ->where('followed_user_id', $followedUser->id)
            ->first();

        return $exists ? true : false;
    }
}