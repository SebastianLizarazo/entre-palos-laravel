<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Producto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'imagen_producto' => $this->faker->unique()->sentence,
            'nombre' => $this->faker->word,
            'tamano' => $this->faker->numberBetween($min = 1, $max = 500),
            'referencia_tamano' => $this->faker->randomElement(array('ml','Lt','Kg','gr','Oz','Lb')),
            'referencia' => $this->faker->unique()->numberBetween($min = 001, $max = 500),
            'precio_base' => $this->faker->numberBetween($min = 10, $max = 10000),
            'precio_unidad_trabajador' => $this->faker->numberBetween($min = 10, $max = 10000),
            'precio_unidad_venta' => $this->faker->numberBetween($min = 10, $max = 10000),
            'presentacion_producto' => $this->faker->randomElement(array('Lata','Botella vidrio','Botella plastico','Tetrapack','Predeterminado',
                'Icopor','Vaso vidrio','Vaso plastico','Tasa')),
            'cantidad_producto' => $this->faker->numberBetween($min = 1, $max = 30),
            'categoria_id' => Categoria::factory() ,//asigno el id de la categoria que cree anteriormente
            'estado' => $this->faker->randomElement(array('Activo','Inactivo'))
        ];
    }
}
