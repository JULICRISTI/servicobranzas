<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth;
use App\Http\Controllers;

// use App\Http\Controllers\MenuController;
// use App\Http\Controllers\InformacionController;
// use App\Http\Controllers\CargarDatosController;
// use App\Http\Controllers\DescargarController;
// use App\Http\Controllers\SubirArchivoController;
// use App\Http\Controllers\EditarRegistroController;

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


// Estructura para llamar a los controladores:
// | 1 -> Importar la carpeta de los controladores: 
// |    use App\Http\Controllers\NombreDeLaCarpeta;
// |
// | 2 -> Crear la ruta:
// |    Route::get('/nombre-de-la-ruta', [NombreDeLaCarpeta\NombreDelControlador::class, 'nombreDeLaFuncion'])->name('nombre-de-la-ruta');
// |   Ejemplo de llamado del controlador:
// |    -> [Controllers\NombreDelControlador::class, 'nombreDeLaFuncion']
// |
// Route::get('/home', [Controllers\HomeController::class, 'index'])->name('home');


// Protege la ruta /home
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/menu', [Controllers\MenuController::class, 'showmenu'])->name('menu');
    Route::get('/cerrarsesion', [Controllers\Auth::class, 'cerrarSesion'])->name('cerrarSesion');
});
Route::get('/Informacion', [Controllers\InformacionController::class, 'showInformacion'])->name('Informacion');
Route::get('/cargar-datos', [Controllers\CargarDatosController::class, 'showCargarDatos'])->name('cargar-datos');

// Ruta para descargar el archivo
Route::post('Descargar', [Controllers\DescargarController::class, 'Descargar'])->name('Descargar');

// Ruta para subir el archivo
Route::post('SubirArchivo', [Controllers\SubirArchivoController::class, 'SubirArchivo'])->name('Subir');

//Ruta editar registros
Route::get('/editar-registro/{id}', [Controllers\EditarRegistroController::class, 'editarRegistro'])->name('editarregistro');
Route::post('/editarregistro', [Controllers\EditarRegistroController::class, 'guardarRegistro'])->name('editarregistro_post');




Route::get('/logout', [Auth::class, 'logout'])->name('logout');







