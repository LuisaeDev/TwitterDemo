<?php

namespace App\Http\Livewire\Components;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Mainbar extends Component
{
    public function render()
    {
        return view('livewire.components.mainbar', [
            'user' => Auth::user()
        ]);
    }
}
