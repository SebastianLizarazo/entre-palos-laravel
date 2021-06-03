<?php

use Illuminate\Support\Facades\Route;


Route::patch('/productos/{producto}/setEstado/{estado}','App\Http\Controllers\ProductoController@setEstado')// Esta es la ruta creada para ir al metodo de cambiar estado del producto
    ->name('productos-setEstado');

Route::get('/', function () {//Esta ruta me redirecciona al login directamente
    return view('auth.login');
})->name('login');

Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {// Una vez ya este autenticado me manda al home
    return view('home');
})->name('home');

Route::resource('/productos', 'App\Http\Controllers\ProductoController')->names('productos');
