<?php

namespace App\Http\Controllers\Api\V1\Me;

use App\Exceptions\TweetException;
use App\Http\Controllers\Controller;
use App\Http\Resources\TweetCollection;
use App\Http\Resources\TweetResource;
use App\Contracts\TweetInterface;
use App\Models\Tweet;
use App\Models\User;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TweetController extends Controller
{
    use ApiResponses;

    /**
     * Constructor.
     *
     * @param TweetInterface $tweetRepo
     */
    public function __construct(TweetInterface $tweetRepo) 
    {
        $this->tweetRepo = $tweetRepo;
    }

    /**
     * Return tweets from the current user.
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {

        // Get the current user
        $user = User::find(1);
        // $user = Auth::user();

        // Call the repository
        $tweets = $this->tweetRepo->index($user);

        // Emit the response
        return $this->responseData([
           'tweets' => new TweetCollection($tweets)
        ]);
    }

    /**
     * Create a new user's tweet.
     *
     * @param Request $request
     * @return void
     */
    public function create(Request $request)
    {
        
        // Input data validation
        $data = $request->validate([
            'message' => 'required|string|max:280'
        ]);

        // Default values
        $data['type'] = 'msj';

        // Get the current user
        $user = User::find(1);
        // $user = Auth::user();

        // Call the repository
        $tweet = $this->tweetRepo->create($user, $data);

        // Emit the response
        return $this->responseData([
           'tweet' => new TweetResource($tweet)
        ]);
    }

    /**
     * Return an user's tweet.
     *
     * @param Request $request
     * @param Tweet $tweet
     * @return void
     */
    public function read(Request $request, Tweet $tweet)
    {
    
        // Get the current user
        $user = User::find(1);
        // $user = Auth::user();

        // Validate if the current user can perform the delete action
        if (Gate::denies('read-tweet', $tweet)) {
            throw new TweetException('forbidden-resource');
        }

        // Call the repository
        $tweet = $this->tweetRepo->read($user, $tweet);

        // Emit the response
        return $this->responseData([
            'tweet' => new TweetResource($tweet)
        ]);
    }

    /**
     * Delete a tweet.
     *
     * @param Request $request
     * @param Tweet $tweet
     * @return void
     */
    public function delete(Request $request, Tweet $tweet)
    {

        // Get the current user
        $user = User::find(1);
        // $user = Auth::user();

        // Validate if the current user can perform the delete action
        if (Gate::denies('delete-tweet', $tweet)) {
            throw new TweetException('forbidden-resource');
        }

        // Call the repository
        $tweet = $this->tweetRepo->delete($user, $tweet);

        // Emit the response
        return $this->response(204);
    }
}
