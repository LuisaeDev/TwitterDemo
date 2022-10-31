<?php

namespace App\Http\Livewire\Pages;

use App\Models\User;
use Livewire\Component;

class UserPage extends Component
{

    /** @param String Username passed from the route */
    public $username;

    /**
     * Mount the component
     */
    public function mount($username) {
        $this->username = strtolower($username);
    }

    /**
     * Render the component's view
     */
    public function render()
    {

        // Obtain the user from the username
        $user = User::where('username', $this->username)->firstOrFail();

        // Return the view
        return view('livewire.pages.user-page',
            ['user' => $user]
        )->layout('layouts/twitter');

    }
}
