<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListProductosTest extends TestCase
{
    use RefreshDatabase; //Crea las tablas de la BD para que el test trabaje correctamente

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_see_all_productos()
    {
        //$this->withoutExceptionHandling();//Para deshabilitar la captura de esepciones de los test para que nos muestre todoo el error

        //Debemos crear un proyecto para verificar que si lo podemos ver

        $response = $this->get(route('productos.index'));

        //Verificamos que la vista que nos retorna sea la que le pedimos

        //Verificamos si una variable esta disponible en la vista

        $response->assertStatus(200);

        //Verificamos que se pueda ver el nombre del proyecto en la respuesta
    }
}
