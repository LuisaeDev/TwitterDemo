<?php

namespace App\Contracts;

use App\Models\Tweet;
use App\Models\User;
use Illuminate\Contracts\Pagination\Paginator;

interface TweetInterface
{
    public function index(User $user): Paginator;
    public function create(User $user, array $data): Tweet;
    public function read(User $user,  Tweet $tweet): Tweet;
    public function delete(User $user, Tweet $tweet): bool|null;
}