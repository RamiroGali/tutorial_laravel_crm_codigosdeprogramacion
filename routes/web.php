<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
	Route::get('dashboard', [DashboardController::class, 'index'])->name('dasboard.index');
	// return view('layout.admin');

	Route::put('clients/activate/{client}', [ClientController::class, 'activate'])->name('clients.activate');
	Route::get('clients/deleted', [ClientController::class, 'deleted'])->name('clients.deleted');

	// Permitir la carga de las rutas para Clients
	Route::resource('clients', ClientController::class);
});

// Redirige la raíz a /login
Route::redirect('/', '/login');

// Route::get('/', function () {
//     // return view('welcome');
//     return view('auth.login');
// });

// Muestra el formulario de login (GET)
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

// Procesa el login (POST)
Route::post('/login', [AuthController::class, 'login'])->name('login.perform');

Route::get('dashboard', function () {
	// return view('layout.admin');
	return view('dashboard');
});

