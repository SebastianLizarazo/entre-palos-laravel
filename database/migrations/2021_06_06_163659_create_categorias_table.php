<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->id('id')->unique();
            $table->string('nombre')->unique();
            $table->enum('tipo',['Comida','Bebida','Postre']);
            $table->enum('estado',['Activo','Inactivo']);
            $table->timestamps();
        });

        Schema::table('productos', function (Blueprint $table){//Directamente desde esta migracion metemos en la tabla producto la columna referente a la llave foranea
            //La llave foranea va a estar ubicada despues de la columna cantidad_producto y va a ser nullable
            $table->unsignedBigInteger('categoria_id')->nullable()->after('cantidad_producto');

            //Aclaramos que el campo categoria_id es una llave foranea, el segundo parametro va a ser el nombre de la relacion, que hace referencia a la columna id de la tabla categorias
            $table->foreign('categoria_id','categoria_producto')->references('id')->on('categorias')
                    ->onUpdate('cascade')//onUpdate determina una accion cuando se acutalice el id de la categoria, y la accion va a ser que se actualice en cascada osea en todos lo proyecto que tengan ese id de categoria
                    ->onDelete('set null');//onDelte determina una accion cuando se elimina una categoria, en este caso le decimos que cuando
                                                 // se elimine una categoria, en los campos donde estaba como llave foranea en la tabla producto vuelvan al valor null
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productos', function (Blueprint $table){//Vamos a borrar la columna categoria_id

            $table->dropForeign('productos_categoria_id_foreign');//Primero eliminamos la restriccion de la llave foranea de la base de datos
            $table->dropColumn('categoria_id');// Ahora si eliminamos la columna categoria_id de la tabla producto

        });

        Schema::dropIfExists('categorias');//Y despues si eliminamos la tabla categoria
    }
}
