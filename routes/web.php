<?php

use App\Http\Controllers\PersonaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Register;

Route::get('/', function () {
    return view('index');
});
Route::get('about/', function () {
    return view('about');
});

Route::resource('/register', Register::class);

Route::resource('/usuarios', PersonaController::class);

