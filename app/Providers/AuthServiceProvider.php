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
        // 'App\Model' => 'App\Policies\ModelPolicy',
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
            if ($user->role->role_id == 1) {
                return true;
            }
        });

        Gate::define('create-user', function ($user) {
            if ($user->role->role_id == 1) {
                return true;
            }
        });

        Gate::define('update-user', function ($user, $id) {
            return $user->id == $id;
        });

        Gate::define('delete-user', function ($user, $id) {
            return $user->id == $id;
        });
    }
}
