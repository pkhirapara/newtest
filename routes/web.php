<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;

Route::get('/', [UserController::class, 'index']);

Route::get('/posts/{id?}', function ($id = 20) {
   return 'Blo posts ' . $id;
})
//    ->where(['id' => '[0-9]+'])
    ->name('posts.show');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/customers', [CustomerController::class, 'index']);
Route::get('/customers/create', [CustomerController::class, 'create']);
Route::post('/customers', [CustomerController::class, 'store']);

