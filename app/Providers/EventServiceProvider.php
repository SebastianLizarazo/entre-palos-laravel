<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        //Es importante definir los namespace a los que pertenecen
        \App\Events\ProductoSaved::class => [//Definimos el evento que sera el que le de la informacion que necesita el listener
            \App\Listeners\OptimizeProductImage::class//Definimos los listeners que responderan al evento y que ejecutara una accion con la info que le de el evento
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
