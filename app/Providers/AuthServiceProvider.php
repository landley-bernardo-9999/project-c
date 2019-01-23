<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        $gate->define('isLeasingOfficer', function($user){
            return $user->position == 'leasingOfficer';
        });

        $gate->define('isLeasingManager', function($user){
            return $user->position  == 'leasingManager'; 
        });

        $gate->define('isMaintenance', function($user){
            return $user->position == 'maintenance';
        });

        $gate->define('isExecutive', function($user){
            return $user->position == 'executive';
        });

        $gate->define('isAdmin', function($user){
            return $user->position == 'admin';
        });

        $gate->define('isTreasury', function($user){
            return $user->position == 'treasury';
        });
    }
}
