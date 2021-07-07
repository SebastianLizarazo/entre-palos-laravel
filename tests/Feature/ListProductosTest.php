<?php

namespace Tests\Feature;

use App\Models\Categoria;
use App\Models\Producto;
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

        $categoria = Categoria::create([//Primero creo una categoria para que no haya probrema con la asignacion de la llave foranea en el producto
            'nombre' => 'Categoria 69',
            'tipo' => 'Comida',
            'estado' => 'Inactivo'
        ]);

        $producto = Producto::create([
            'nombre' => 'Canre asada',
            'tamano' => 200,
            'referencia_tamano' => 'ml',
            'referencia' => 021,
            'precio_base' => 2200,
            'precio_unidad_trabajador' => 4000,
            'precio_unidad_venta' => 5000,
            'presentacion_producto' => 'Tetrapack',
            'cantidad_producto' => 5,
            'categoria_id' => $categoria->id,//asigno el id de la categoria que cree anteriormente
            'estado' => 'Activo'
        ]); //Debemos crear un proyecto para verificar que si lo podemos ver

        $producto2 = Producto::create([
            'imagen_producto' => 'sjdhaksdhalsdhksdasd',
            'nombre' => 'Agua molida',
            'tamano' => 300,
            'referencia_tamano' => 'ml',
            'referencia' => 032,
            'precio_base' => 2200,
            'precio_unidad_trabajador' => 4000,
            'precio_unidad_venta' => 5000,
            'presentacion_producto' => 'Tetrapack',
            'cantidad_producto' => 5,
            'categoria_id' => $categoria->id,//asigno el id de la categoria que cree anteriormente
            'estado' => 'Activo'
        ]);

        $response = $this->get(route('productos.index'));

        $response->assertViewIs('modules.producto.index'); //Verificamos que la vista que nos retorna es la que le pedimos

        $response->assertViewHas('productos'); //Verificamos si una variable esta disponible en la vista

        $response->assertStatus(200);

        $response->assertSee($producto->nombre); //Verificamos que se pueda ver el nombre del proyecto en la respuesta
        $response->assertSee($producto2->nombre);
    }

    public function test_can_see_individual_producto()
    {
        $categoria = Categoria::create([//Primero creo una categoria para que no haya probrema con la asignacion de la llave foranea en el producto
            'nombre' => 'Categoria 69',
            'tipo' => 'Comida',
            'estado' => 'Inactivo'
        ]);

        $producto = Producto::create([
            'nombre' => 'Canre asada',
            'tamano' => 200,
            'referencia_tamano' => 'ml',
            'referencia' => 021,
            'precio_base' => 2200,
            'precio_unidad_trabajador' => 4000,
            'precio_unidad_venta' => 5000,
            'presentacion_producto' => 'Tetrapack',
            'cantidad_producto' => 5,
            'categoria_id' => $categoria->id,//asigno el id de la categoria que cree anteriormente
            'estado' => 'Activo'
        ]);
        $producto2 = Producto::create([
            'imagen_producto' => 'sjdhaksdhalsdhksdasd',
            'nombre' => 'Agua molida',
            'tamano' => 300,
            'referencia_tamano' => 'ml',
            'referencia' => 032,
            'precio_base' => 2200,
            'precio_unidad_trabajador' => 4000,
            'precio_unidad_venta' => 5000,
            'presentacion_producto' => 'Tetrapack',
            'cantidad_producto' => 5,
            'categoria_id' => $categoria->id,//asigno el id de la categoria que cree anteriormente
            'estado' => 'Activo'
        ]);

        $response = $this->get( route('productos.show',$producto));

        $response->assertSee($producto->referencia_tamano);//Verificamos si podemos ver el show de este producto en especifico
        $response->assertDontSee($producto2->nombre);//Verificamos si efectivamente NO podemos ver el show del producto 2
    }
}
