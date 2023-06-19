<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\InformacionController;
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
    Route::get('/informacion/{id}', [InformacionController::class, 'showInformacion'])->name('informacion');
    Route::get('/home', [Auth::class, 'home'])->name('home');
    Route::get('/menu', [MenuController::class, 'showmenu'])->name('menu');
    Route::post('/informacion', [InformacionController::class, 'addInformacion'])->name('informacion.add');

});

Route::get('/logout', [Auth::class, 'logout'])->name('logout');







