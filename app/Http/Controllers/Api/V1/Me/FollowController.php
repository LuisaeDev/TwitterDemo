<?php

namespace App\Http\Controllers\Api\V1\Me;

use App\Http\Controllers\Controller;
use App\Contracts\FollowInterface;
use App\Http\Resources\FollowCollection;
use App\Models\Tweet;
use App\Models\User;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{

    use ApiResponses;

    /**
     * Constructor.
     *
     * @param FollowInterface $followRepo
     */
    public function __construct(FollowInterface $followRepo) 
    {
        $this->followRepo = $followRepo;
    }

    /**
     * Return followers for the current user.
     *
     * @param Request $request
     * @return void
     */
    public function followers(Request $request)
    {

        // Get the current user
        $user = Auth::user();

        // Call the repository
        $followers = $this->followRepo->followers($user);

        // Emit the response
        return new FollowCollection($followers);
    }

    /**
     * Return following users for the current user.
     *
     * @param Request $request
     * @return void
     */
    public function following(Request $request)
    {

        // Get the current user
        $user = Auth::user();

        // Call the repository
        $following = $this->followRepo->following($user);

        // Emit the response
        return new FollowCollection($following);
    }

    /**
     * Set a following relation.
     *
     * @param Request $request
     * @return void
     */
    public function follow(Request $request)
    {
        // Request input data
        $data = $request->validate([
            'user_uuid' => 'required|uuid|exists:users,uuid'
        ]);

        // Get the current user
        $followerUser = Auth::user();
        $followedUser = User::where('uuid', $data['user_uuid'])->first();

        // Call the repository
        $this->followRepo->follow($followerUser, $followedUser);

        // Emit the response
        return $this->response(204);
    }

    /**
     * Remove a following relation.
     *
     * @param Request $request
     * @return void
     */
    public function unfollow(Request $request)
    {
        // Request input data
        $data = $request->validate([
            'user_uuid' => 'required|uuid|exists:users,uuid'
        ]);

        // Get the current user
        $followerUser = Auth::user();
        $followedUser = User::where('uuid', $data['user_uuid'])->first();

        // Call the repository
        $this->followRepo->unfollow($followerUser, $followedUser);

        // Emit the response
        return $this->response(204);        
    }
}
