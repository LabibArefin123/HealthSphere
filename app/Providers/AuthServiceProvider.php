<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider; // <-- Fix here
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // Add model-to-policy mappings here if needed
    ];

    /**
     * Register any application authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies(); // This will now work correctly

        Gate::define('not-user', function ($user) {
            return $user->user_type != 2; // Assuming 'User' has role ID 3
        });
    }
}
