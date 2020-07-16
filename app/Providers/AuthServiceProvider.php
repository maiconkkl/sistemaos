<?php

namespace App\Providers;

use App\Roles;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;

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
        if (Schema::hasTable('roles')) {
            foreach (Roles::all() as $permission) {
                Gate::define($permission->key, function ($user) use ($permission) {
                    return $user->hasRole('admin') ? $user->hasRole('admin') : $user->hasRole($permission->key);
                });
            }
        }
    }
}
