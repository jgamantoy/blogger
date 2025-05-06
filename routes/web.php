<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;

use App\Http\Middleware\LoggedIn;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::view('register', 'register')->name('register');
Route::view('login', 'login')->name('login');
Route::view('create', 'create')->name('create');

Route::view('home', 'home')->middleware('auth');

Route::controller(UserController::class)->group(function() {
    Route::post('register', 'store')->name('user.store');
    Route::post('login', 'authenticate')->name('user.authenticate');
    
    Route::get('user', 'find');
    Route::get('users', 'index');
    Route::get('user/flush', 'flush');
});

Route::group([
    'prefix' => 'blog',
    'controller' => BlogController::class
], function() {
    Route::post('', 'store')->name('blog.store');
    Route::delete('{id}', 'destroy')->name('blog.delete');
    Route::get('{id}', 'view')->name('blog.view');
    Route::get('edit/{id}', 'find');
    Route::put('{id}', 'edit')->name('blog.edit');
});
