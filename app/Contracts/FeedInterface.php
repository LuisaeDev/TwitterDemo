<?php

namespace App\Contracts;

use App\Models\User;
use Illuminate\Contracts\Pagination\Paginator;

interface FeedInterface
{
    public function index(User $user): Paginator;
}