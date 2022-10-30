<?php

use App\Http\Controllers\Api\V1\Me\TweetController;
use App\Http\Controllers\Api\V1\Me\FollowController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('ping', function() {
    return 'pong';
});

Route::prefix('v1')->group(function () {

    // Me / Tweets
    Route::get('me/tweets',                [ TweetController::class, 'index' ]);
    Route::post('me/tweet',                [ TweetController::class, 'create' ]);
    Route::get('me/tweet/{tweet:uuid}',    [ TweetController::class, 'read' ]);
    Route::delete('me/tweet/{tweet:uuid}', [ TweetController::class, 'delete' ]);

    // Me / Following
    Route::get('me/followers', [ FollowController::class, 'followers' ]);
    Route::get('me/following', [ FollowController::class, 'following' ]);
    Route::post('me/follow',   [ FollowController::class, 'follow' ]);
    Route::post('me/unfollow', [ FollowController::class, 'unfollow' ]);

});