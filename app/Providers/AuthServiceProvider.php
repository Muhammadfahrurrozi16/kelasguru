<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    public static $permission = [
        'dashboard' => [1],
    ];
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
        foreach (self::$permission as $features => $role) {
            Gate::define($features, function(User $user) use($role) {
                if (in_array($user->role_id, $role)) {
                    return true;
                }
            });
        }
    }
}
