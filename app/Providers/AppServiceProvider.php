<?php

namespace App\Providers;

use App\Models\Bug;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
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
        Gate::define('edit-bug', function (User $user, Bug $bug) {
            return $bug->assigned_staff->is($user) || $user->role_id == 1;
        });

        Gate::define('destroy-bug', function (User $user, Bug $bug) {
            return $bug->reporter->is($user);
        });

        Gate::define('create-bug', function (User $user) {
            return $user->role_id == 3;
        });

        Gate::define('show-bug', function (User $user, Bug $bug) {
            return $user->role_id == 1
            || $bug->reporter->is($user)
            || ($bug->assigned_staff && $bug->assigned_staff->is($user));
        });
    }
}
