<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Tweet;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Gates for tweets
        Gate::define('read-tweet', function (User $user, Tweet $tweet) {
            return $user->id === $tweet->user_id;
        });
        Gate::define('delete-tweet', function (User $user, Tweet $tweet) {
            return $user->id === $tweet->user_id;
        });
    }
}
