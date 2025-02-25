<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Livewire\Productos\Index;



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
})->name('/');;

//Ruta para descargar ficha tecnica en pdf
Route::get('/descargar-ficha/{id}', [PdfController::class, 'descargarFicha'])->name('descargar.ficha');


//Rutas para usuarios autenticados
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/admin', function () {
    return view('dashboard');
})->name('dashboard2');




Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/productos', Index::class )->name('productos.index');
});




