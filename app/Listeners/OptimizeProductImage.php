<?php

namespace App\Listeners;

use App\Events\ProductoSaved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class OptimizeProductImage
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ProductoSaved  $event
     * @return void
     */
    public function handle(ProductoSaved $event)//Este metodo es el que se ejecutara cuando se dispare el evento y se ejecute este listener
    {                                       //Accede a traves del evento al producto
        $imagen = Image::make(Storage::get($event->producto->imagen_producto))//Traemos del storage la imagen del proyecto y la metemos en el metodo make de Image
                ->widen(600)//Redimencionamos el ancho de la imagen pero dejamos el alto libre
                ->limitColors(255)//Limitamos sus colores para que pece aun menos
                ->encode();//y volvemos a codificar la imagen a su estado original

        Storage::put($event->producto->imagen_producto, (string)$imagen);//Aca remplazamos la imagen original(primer parametro)por la nueva imagen redimensionada(segundo parametro) pero la establecemos como un string

    }
}
