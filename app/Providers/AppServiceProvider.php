<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('admin', function ($user) {
            return $user->role_id === 1;
        });

        Gate::define('doctor', function ($user) {
            return $user->role_id === 2;
        });

        Gate::define('patient', function ($user) {
            return $user->role_id === 2;
        });
    }
}
