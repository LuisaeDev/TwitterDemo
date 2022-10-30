<?php

namespace App\Providers;

use App\Contracts\FollowInterface;
use App\Contracts\TweetInterface;
use App\Repositories\FollowRepository;
use App\Repositories\TweetRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TweetInterface::class, TweetRepository::class);
        $this->app->bind(FollowInterface::class, FollowRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
