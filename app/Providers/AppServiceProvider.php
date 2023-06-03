<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Genre;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        Paginator::useBootstrap();
        Gate::define("admin", function ( User $user ) {
            return $user->role;
        });

        Gate::define("peminjam", function ( User $user ) {
            return $user->role;
        });

        Gate::define("pegawai", function ( User $user ) {
            return $user->role;
        });

        View::composer('layouts.navbar', function ($view) {
            $genre = Genre::all();
            $view->with('genre', $genre);
        });
    }
}
