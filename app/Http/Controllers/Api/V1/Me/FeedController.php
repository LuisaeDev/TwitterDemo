<?php

namespace App\Http\Controllers\Api\V1\Me;

use App\Http\Controllers\Controller;
use App\Contracts\FeedInterface;
use App\Http\Resources\TweetCollection;
use App\Models\User;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    use ApiResponses;

    /**
     * Constructor.
     *
     * @param FeedInterface $feedRepo
     */
    public function __construct(FeedInterface $feedRepo) 
    {
        $this->feedRepo = $feedRepo;
    }

    /**
     * Return all the tweets related to the following users.
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
        $tweets = $this->feedRepo->index($user);

        // Emit the response
        return new TweetCollection($tweets);;
    }
}
