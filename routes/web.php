<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('register', 'register');

Route::view('login', 'login');

Route::controller(UserController::class)->group(function() {
    Route::post('register', 'store')->name('user.store');
    Route::post('login', 'authenticate')->name('user.authenticate');
    
    Route::get('user', 'find');
    Route::get('users', 'index');
});

Route::group([
    'prefix' => 'blog',
    'controller' => BlogController::class
], function() {
    Route::get('create', 'store')->name('blog.store');
});
