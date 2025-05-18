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
    // * DASHBOARD ADMINISTRADOR
    Route::get('/admin', function () {
        return view('admin.admin');
    })->name('admin');
    // * Poner las demas rutas de administrador aquí

});

// * RUTAS COCINA

// * RUTAS JEFE COCINA

// * RUTAS MESERO

// * RUTAS CLIENTE

