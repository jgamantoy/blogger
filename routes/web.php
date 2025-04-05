<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('register', 'register');

Route::view('login', 'login');

Route::post('register', [UserController::class, 'store'])->name('user.store');
Route::post('login', [UserController::class, 'authenticate'])->name('user.authenticate');

Route::get('user',[UserController::class, 'find']);
Route::get('users', [UserController::class, 'index']);
