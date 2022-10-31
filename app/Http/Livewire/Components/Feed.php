<?php

namespace App\Http\Livewire\Components;

use App\Contracts\FeedInterface;
use App\Models\User;
use Livewire\Component;

class Feed extends Component
{

    /** @param User */
    public $user;

    /**
     * Render the component's view
     */
    public function render()
    {
        // Obtain all the tweets from the Feed repository
        $feedRepo = app()->get(FeedInterface::class);
        $tweets = $feedRepo->index($this->user);

        // Return the view
        return view('livewire.components.feed', [
            'tweets' => $tweets
        ]);
    }
}
