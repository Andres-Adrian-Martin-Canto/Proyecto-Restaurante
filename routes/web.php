<?php

use App\Exports\UsuariosExport;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ClienteControllerPedidos;
use App\Http\Controllers\jefe_cocinaController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\MeseroController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

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

Route::get('/exportar-usuarios', function () {
    return Excel::download(new UsuariosExport, 'usuarios.xlsx');
});
// TODO: rutas de los roles

// * RUTAS ADMINISTADOR
Route::middleware(['auth'])->group(function () {

    // * Rutas CLIENTE
    Route::middleware(['iscliente'])->prefix('cliente')->group(function () {

        // * ruta raiz
        Route::get('/', [ClienteController::class, 'index'])->name('cliente');
        // * RUTA PARA VER PRODUCTOS

        Route::get('/pedidos', [ClienteControllerPedidos::class, 'pedidos'])->name('cliente.pedidos');
        //Ruta para guardar los pedidos en la base de datos.
        Route::post('/comanda', [ClienteController::class, 'guardarComanda'])->name('cliente.guardarComanda');
        Route::post('/reservaciones', [ClienteController::class, 'getReservaciones'])->name('cliente.reservaciones.post');

        // * Ruta para reservaciones
        Route::get('/reservaciones', function () {
            return view('client.reservaciones');
        })->name('cliente.reservaciones');


        // * Agregar las de mas rutas del cliente
        Route::post('/cliente/reservaciones/guardar', [ClienteController::class, 'guardarReservacion'])
            ->name('cliente.reservaciones.guardar');
    });

    // * Rutas ADMIN
    Route::middleware(['isadmin'])->prefix('admin')->group(function () {
        // * ruta raiz
        Route::get('/', function () {
            return view('admin.admin');
        })->name('admin');
        // * Agregar las demas rutas del admin
        //Ruta para generar reportes
        Route::post('/reporte/exportar', [ReportesController::class, 'exportar'])->name('reporte.exportar');
    });


    // * RUTAS JEFE COCINA
    Route::middleware(['isjefe_cocina'])->prefix('cocina')->group(function () {
        // * ruta raiz
        Route::get('/', [jefe_cocinaController::class, 'index'])->name('jefe_cocina');
        Route::post('/actualizarEstadoComanda', [jefe_cocinaController::class, 'actualizarEstadoComanda'])->name('jefe_cocina.actualizarEstadoComanda');
        // * Agregar las de mas rutas de cocina

    });


    // * RUTAS MESERO
    Route::middleware(['ismesero'])->prefix('mesero')->group(function () {
        // * ruta raiz
        Route::get('/', [MeseroController::class, 'index'])->name('mesero');
        Route::post('/registrarPedido', [MeseroController::class, 'registrarPedido'])->name('mesero.registrarPedido');
        // * Agregar las de mas rutas del mesero
        // RUTA PARA LA VISTA DE COMANDAS
        Route::get('/comandas', [MeseroController::class, 'verComandasMesero'])->name('mesero.verComandasMesero');
        // POST para cambiar el estado de la comanda
        Route::post('/cambiarEstadoComanda', [MeseroController::class, 'cambiarEstadoComanda'])->name('mesero.cambiarEstadoComanda');
    });



    // * Ruta para deslogearse
    // !! NO MOVER NI HACER NADA CON ESTA RUTA
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
