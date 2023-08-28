<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;
use  Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // adding bootstrap as default pagination
        Paginator::useBootstrap();

        // adding gate to protect / authorization page
        Gate::define('admin', function (User $user) {
            return $user->name === "Admin";
        });
    }
}
