<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class Tweet extends Component
{

    /** @param Tweet */
    public $tweet;

    /**
     * Render the component's view
     */
    public function render()
    {
        return view('livewire.components.tweet');
    }
}