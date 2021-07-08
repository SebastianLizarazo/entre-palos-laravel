<?php

namespace Tests\Feature;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\User;
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
        //Ejemplo de prueba para ver que me devuelve esta factory
        //$categoria = Categoria::factory()->make();
        //dd($categoria->toArray());

        $this->withoutExceptionHandling();

        $producto = Producto::factory()->create();
        $producto2 = Producto::factory()->create();

        $response = $this->get(route('productos.index'));

        $response->assertViewIs('modules.producto.index'); //Verificamos que la vista que nos retorna es la que le pedimos

        $response->assertViewHas('productos'); //Verificamos si una variable esta disponible en la vista

        $response->assertStatus(200);

        //dd($producto->nombre);
        $response->assertSee($producto->nombre); //Verificamos que se pueda ver el nombre del proyecto en la respuesta
        $response->assertSee($producto2->nombre);
    }

    public function test_can_see_individual_producto()
    {
        //$this->withoutExceptionHandling();

        $producto = Producto::factory()->create();
        $producto2 = Producto::factory()->create();

        $response = $this->get( route('productos.show',$producto));

        $response->assertSee($producto->referencia_tamano);//Verificamos si podemos ver el show de este producto en especifico
        $response->assertDontSee($producto2->nombre);//Verificamos si efectivamente NO podemos ver el show del producto 2
    }
}
