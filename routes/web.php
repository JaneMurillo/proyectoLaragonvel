<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaginasController;
use App\Http\Controllers\ProductoController;
use App\Models\Producto;

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

Route::get('/', function () {
    return view('welcome');
});

//Route::get('producto', [ProductoController::class, 'index']);

Route::get('canciones/{id?}', [PaginasController::class, 'canciones']);
Route::get('contacto', [PaginasController::class, 'contacto']);
Route::post('contacto', [PaginasController::class, 'postContacto']);

Route::resource('producto', ProductoController::class)->middleware(['can:allow-login', 'verified']);
Route::resource('archivo', ArchivoController::class);
Route::resource('categoria', CategoriaController::class,['parameters' =>['categoria' => 'categoria']])->middleware(['auth', 'verified']);
Route::resource('autor', AutorController::class)->middleware(['auth', 'verified']);
//->except(['show', 'destroy']);
Route::middleware([ 
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $productos = Producto::all();
        return view('dashboard', compact('productos'));
    })->name('dashboard');
});

Route::get('archivo/descarga/{archivo}',
    [ArchivoController::class, 'descargar'])
    ->name('archivo.store');

Route::resource('archivo', ArchivoController::class);
