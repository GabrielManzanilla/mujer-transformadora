<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Register;

Route::get('/', function () {
    return view('index');
});
Route::resource('register', Register::class);


