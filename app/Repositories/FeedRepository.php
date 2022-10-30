<?php

namespace App\Repositories;

use App\Models\Tweet;
use App\Models\User;
use App\Contracts\FeedInterface;
use Illuminate\Contracts\Pagination\Paginator;

class FeedRepository implements FeedInterface
{

    /**
     * Return the feed related to a specific user.
     *
     * @param User $user
     * @return array
     */
    public function index(User $user): Paginator
    {

        // Get all followed users
        $users = $user->following()->select('id')->get()->pluck('id');
        $users[] = $user->id;

        // Get tweets from the followed list
        $tweets = Tweet::query()
            ->whereIn('user_id', $users)
            ->with('user')
            ->latest()
            ->paginate(config('twitter.feed.paginate_per_page'));
        
        // Return data with pagination
        return $tweets;
    }

}