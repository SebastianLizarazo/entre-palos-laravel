<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {//Esta ruta me redirecciona al login directamente
    return view('auth.login');
})->name('login');

Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {// Una vez ya este autenticado me manda al home
    return view('home');
})->name('home');
