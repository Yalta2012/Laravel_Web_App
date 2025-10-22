<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
// use App\Providers\User;
use App\Models\User;
use App\Models\Property;


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
        Paginator::defaultView('pagination::default');
        Gate::define('edit-property', function(User $user, Property $property){
            return $user->is_admin OR $user->id == $property->owner_id;
        });
        Gate::define('destroy-property', function(User $user, Property $property){
            return $user->is_admin;
        });
    }
}
