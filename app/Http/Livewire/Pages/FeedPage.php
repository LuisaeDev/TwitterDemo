<?php

namespace App\Http\Livewire\Pages;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FeedPage extends Component
{

    /**
     * Render the component's view
     */
    public function render()
    {

        // Obtain the current user
        $user = Auth::user();

        // Return the view
        return view('livewire.pages.feed-page',
            ['user' => $user]
        )->layout('layouts/twitter');
    }
}