<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth;
use App\Http\Controllers\ImportExportController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\InformacionController;
use App\Http\Controllers\CargarDatosController;
use App\Http\Controllers\DescargarController;
use App\Http\Controllers\SubirArchivoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [Auth::class, 'login'])->name('login');
Route::post('/', [Auth::class, 'loginPost'])->name('login-post');




// Protege la ruta /home
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [Auth::class, 'home'])->name('home');
    Route::get('/menu', [MenuController::class, 'showmenu'])->name('menu');
});
Route::match(['get', 'post'], '/Informacion/{id?}', [InformacionController::class, 'showInformacion'])->name('Informacion');
Route::get('/cargar-datos', [CargarDatosController::class, 'showCargarDatos'])->name('cargar-datos');

// Ruta para descargar el archivo
Route::post('Descargar', 'ControladorDescargar@accionDescargar')->name('Descargar');

// Ruta para subir el archivo
Route::post('SubirArchivo', 'ControladorSubirArchivo@accionSubir')->name('Subir');


Route::get('/logout', [Auth::class, 'logout'])->name('logout');







