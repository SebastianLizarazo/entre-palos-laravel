<?php

namespace Database\Factories;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoriaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Categoria::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->unique()->word,
            'tipo' => $this->faker->randomElement(array('Comida','Bebida','Postre')),
            'estado' => $this->faker->randomElement(array('Activo','Inactivo'))
        ];
    }
}
