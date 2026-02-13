<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     // return view('welcome');
//     return view('auth.login');
// });

Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
