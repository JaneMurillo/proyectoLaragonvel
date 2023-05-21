<?php

namespace App\Providers;

use App\Models\Team;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Policies\TeamPolicy;
use App\Policies\ProductoPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Team::class => TeamPolicy::class,
        Producto::class => ProductoPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('allow-login',function (User $user) {
            return Auth::check();
        }); 
    }
}
