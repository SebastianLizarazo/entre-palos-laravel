<?php

namespace Tests\Feature;

use App\Models\Categoria;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListCategoriasTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_see_all_categorias()
    {
        //$this->withoutExceptionHandling();

        $categoria = Categoria::factory()->create();
        $categoria2= Categoria::factory()->create();

        $response = $this->get(route('categorias.index'));


        $response->assertStatus(200);

        $response->assertViewIs('modules.categoria.index');

        $response->assertViewHas('categorias');

        $response->assertSee($categoria->nombre);
        $response->assertSee($categoria2->nombre);
    }

    public function test_can_see_individual_categoria()
    {
        $categoria = Categoria::factory()->create();
        $categoria2= Categoria::factory()->create();

        $response = $this->get(route('categorias.show', $categoria));

        $response->assertSee($categoria->nombre);

        $response->assertDontSee($categoria2->nombre);
    }
}
