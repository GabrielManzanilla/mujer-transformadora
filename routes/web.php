<?php

use App\Http\Controllers\datos_personales;
use App\Http\Controllers\PersonaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Register;
use App\Http\Controllers\AuthController;



Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('make.login');
Route::get('/registro', [AuthController::class, 'showRegister'])->name('registro');
Route::post('/registro', [AuthController::class, 'register'])->name('make.register');



Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('index');
});
Route::get('about/', function () {
    return view('about');
});

Route::resource('/usuarios', PersonaController::class);

Route::middleware(['auth'])->group(function () {
    Route::get('/register', [Register::class, 'index'])->name('registers');
    Route::get('/register/form', [Register::class, 'create'])->name('show.register');
    Route::post('/register', [Register::class, 'store'])->name('register.store');
    Route::get('perfil', [datos_personales::class, 'index'])->name('perfil');
    Route::get('perfil/editar', [datos_personales::class, 'edit'])->name('actualizar.perfil');
    Route::put('perfil/editar', [datos_personales::class, 'update'])->name('make.update');

});
