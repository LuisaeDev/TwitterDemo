<?php

namespace App\Http\Livewire\Components;

use App\Contracts\FollowInterface;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FollowerBlock extends Component
{
    public $user;

    public $following = true;

    public function unfollow()
    {
        $followRepo = app()->get(FollowInterface::class);
        $followRepo->unfollow(Auth::user(), $this->user);
        $this->following = false;
    }

    public function follow()
    {
        $followRepo = app()->get(FollowInterface::class);
        $followRepo->follow(Auth::user(), $this->user);
        $this->following = true;
    }

    public function render()
    {
        return view('livewire.components.follower-block');
    }
}