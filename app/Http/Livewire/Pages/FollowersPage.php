<?php

namespace App\Http\Livewire\Pages;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FollowersPage extends Component
{

    /**
     * Render the component's view
     */
    public function render()
    {

        // Obtain the current user
        $user = Auth::user();

        // Return the view
        return view('livewire.pages.followers-page',
            ['user' => $user]
        )->layout('layouts/twitter');
    }
}