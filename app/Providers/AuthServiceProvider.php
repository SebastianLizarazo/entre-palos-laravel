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
    public function boot()//En este metodo se crean los gates deseados
    {
        $this->registerPolicies();

        Gate::define('create-producto', function ($user){//definimos este gate para verificar si el usuario que esta autenticado puede crear un producto
           return $user->rol === 'Administrador';
        });
    }
}
