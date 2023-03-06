<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaginasController;
use App\Http\Controllers\ProductoController;

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

Route::resource('producto', ProductoController::class);
//->except(['show', 'destroy']);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
