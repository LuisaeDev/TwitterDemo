<?php

namespace App\Http\Livewire\Components;

use App\Contracts\TweetInterface;
use App\Models\User;
use Livewire\Component;

class Tweets extends Component
{

    /** @param User */
    public $user;

    /**
     * Render the component's view
     */
    public function render()
    {
        // Obtain all the tweets from the Tweet repository
        $tweetRepo = app()->get(TweetInterface::class);
        $tweets = $tweetRepo->index($this->user);

        // Return the view
        return view('livewire.components.feed', [
            'tweets' => $tweets
        ]);
    }
}
