<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Admin;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('add_user', function (Admin $admin) {
            return $admin->hasAnyPermission('add_user') ? Response::allow() : Response::deny('You don\'t have permission to create new user'); ;
        });
    }
}
