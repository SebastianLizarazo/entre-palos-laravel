<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id('id');
            $table->string('nombre');
            $table->smallInteger('tamano')->unsigned();
            $table->enum('referencia_tamano',['ml','Lt','Kg','gr','Oz','Lb']);
            $table->string('referencia');
            $table->integer('precio_base')->unsigned();
            $table->integer('precio_unidad_trabajador')->unsigned();
            $table->integer('precio_unidad_venta')->unsigned();
            $table->enum('presentacion_producto',[
                'Lata','Botella vidrio','Botella plastico','Tetrapack','Predeterminado',
                 'Icopor','Vaso vidrio','Vaso plastico','Tasa']);
            $table->smallInteger('cantidad_producto')->unsigned();
            $table->enum('estado',['Activo','Inactivo']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
