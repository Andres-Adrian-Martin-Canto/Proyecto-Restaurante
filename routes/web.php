<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'index'])->name('login.form');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login');

Route::get('/registrar', function () {
    return view('register');
})->name('register.form');

Route::post('/registrar', [AuthController::class, 'registrar'])->name('register');


// TODO: rutas de los roles

// * RUTAS ADMINISTADOR
Route::middleware(['auth'])->group(function () {
    // * RUTAS CLIENTE
    Route::middleware(['iscliente'])->prefix('cliente')->group(function () {
        // * ruta raiz
        Route::get('/', function ()  {
            return view('client.cliente');
        })->name('cliente');
        // * Agregar las de mas rutas del cliente


    });

    // * Rutas ADMIN
    Route::middleware(['isadmin'])->prefix('admin')->group(function () {
        // * ruta raiz
        Route::get('/', function () {
            return view('admin.admin');
        })->name('admin');
        // * Agregar las demas rutas del admin


    });


    // * RUTAS COCINA

// * RUTAS JEFE COCINA

// * RUTAS MESERO





    // * Ruta para deslogearse
    // !! NO MOVER NI HACER NADA CON ESTA RUTA
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
