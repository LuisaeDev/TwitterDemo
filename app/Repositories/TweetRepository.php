<?php

namespace App\Repositories;

use App\Exceptions\TweetException;
use App\Models\Tweet;
use App\Models\User;
use App\Contracts\TweetInterface;

class TweetRepository implements TweetInterface
{

    /**
     * Return tweets from a specific user.
     *
     * @param User $user
     * @return array
     */
    public function index(User $user)
    {
        // Obtain user's tweets
        $tweets = Tweet::query()
            ->where('user_id', $user->id)
            ->with('user')
            ->orderByDesc('created_at', 'DESC');

        // Return paginated data
        return $tweets->paginate();
    }

    /**
     * Create a new tweet for a specific user.
     *
     * @param User $user
     * @param array $data
     * @return Tweet
     */
    public function create(User $user, array $data): Tweet
    {
        // Create the new Tweet model
        $tweet = new Tweet();
        $tweet->user_id = $user->id;
        
        // Check if the type specified is valid
        if (!in_array($data['type'], ['img', 'msj', 'vid'])) {
            throw new TweetException('invalid-tweet-type', [
                'type' => $data['type']
            ]);
        }

        // Assign values
        $tweet->type = $data['type'];
        $tweet->message = $data['message'];
        $tweet->save();

        // Return the model
        return $tweet;
    }

    /**
     * Return an user's tweet.
     *
     * @param User $user
     * @param Tweet $tweet
     * @return Tweet
     */
    public function read(User $user,  Tweet $tweet): Tweet
    {
    
        // Check if the user is the owner's tweet
        if ($user->id !== $tweet->user_id) {
            throw new TweetException('forbidden-resource');
        }

        // Return the model
        return $tweet;
    }

    /**
     * Delete a tweet for a specific user.
     *
     * @param User $user
     * @param Tweet $tweet
     * @return boolean|null
     */
    public function delete(User $user, Tweet $tweet): bool|null
    {

        // Check if the user is the author
        if ($user->id !== $tweet->user_id) {
            throw new TweetException('forbidden-resource');
        }

        // Delete the model
        return $tweet->delete();
    }
}