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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(){
        $this->registerPolicies();
        Gate::define('isSuperAdmin', function ($user) {
            return $user->hasRole('superadmin');
        });
        Gate::define('isLibrarian', function ($user) {
            return $user->hasRole('librarian');
        });
        // Gate::define('isSuperAdmin', fn($user) => $user->hasRole('superadmin'));
        // Gate::define('isLibrarian', fn($user) => $user->hasRole('librarian1'));
        // Gate::define('isLibrarian', fn($user) => $user->hasRole('librarian2'));
    }
}