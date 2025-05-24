<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClienteController;
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

    // * Rutas CLIENTE
    Route::middleware(['iscliente'])->prefix('cliente')->group(function () {

        // * ruta raiz
        Route::get('/', [ClienteController::class, 'index'])->name('cliente');
        // * RUTA PARA VER PRODUCTOS
        // !!! PODRIAS CAMBIAR EL CONTROLADOR A PRODUCTO, PRIMERO CREAR EL CONTROLADOR PRODUCTO
        Route::get('/pedidos', [AuthController::class, 'pedidos'])->name('cliente.pedidos');

        // * Ruta para reservaciones
        Route::get('/reservaciones', function () {
            return view('client.reservaciones');
        })->name('cliente.reservaciones');


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


    // * RUTAS JEFE COCINA
    Route::middleware(['isjefe_cocina'])->prefix('cocina')->group(function () {
        // * ruta raiz
        Route::get('/', function () {
            return view('jefe-cocina.jefeCocina');
        })->name('jefe_cocina');
        // * Agregar las de mas rutas de cocina

    });


    // * RUTAS MESERO
    Route::middleware(['ismesero'])->prefix('mesero')->group(function () {
        // * ruta raiz
        Route::get('/', function () {
            return view('mesero.mesero');
        })->name('mesero');
        // * Agregar las de mas rutas del mesero

        // RUTA PARA LA VISTA DE COMANDAS
        Route::get('/comandas', function () {
            return view('mesero.comandas');
        })->name('mesero.comandas');
    });



    // * Ruta para deslogearse
    // !! NO MOVER NI HACER NADA CON ESTA RUTA
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
