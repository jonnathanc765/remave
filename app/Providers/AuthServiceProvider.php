<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        'App\Post'  => 'App\Policies\PostPolicy',
        'App\Order' => 'App\Policies\OrderPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function ($user, $ability) {
            if ($user->hasRole('superadmin')) {
                return true;
            }
        });

        // Gate::define('update-post', function ($user, $post) {
        //     return $user->shop->id == $post->shop_id;
        // });
    }
}
