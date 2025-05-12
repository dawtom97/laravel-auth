<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');


Route::post('/register', [AuthController::class,'register']);
Route::get('/register', [AuthController::class,'registerPage'])->name('register');

// TODO route do aktywacji konta