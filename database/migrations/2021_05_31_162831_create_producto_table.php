<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->string('Nombre');
            $table->smallInteger('Tamano')->unsigned();
            $table->enum('ReferenciaTamano',['ml','Lt','Kg','gr','Oz','Lb']);
            $table->string('Referencia');
            $table->integer('PrecioBase')->unsigned();
            $table->integer('PrecioUnidadTrabajador')->unsigned();
            $table->integer('PrecioUnidadVenta')->unsigned();
            $table->enum('PresentacionProdcuto',[
                'Lata','Botella vidrio','Botella plastico','Tetrapack','Predeterminado',
                 'Icopor','Vaso vidio','Vaso plastico','Tasa']);
            $table->smallInteger('CantidadProducto')->unsigned();
            $table->enum('Estado',['Activo','Inactivo']);
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
        Schema::dropIfExists('producto');
    }
}
