<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;

Route::get('/', [UserController::class, 'index']);

Route::view('/index', 'home.index')->name('home.index');

Route::view('/contact', 'home.contact')->name('home.contact');

Route::get('/posts/{id}', function ($id) {
    $posts = [
        1 => [
            'title'   => 'Intro to Laravel',
            'content' => 'This is a short intro to Laravel',
            'is_new'  => false,
        ],
        2 => [
            'title'   => 'Intro to PHP',
            'content' => 'This is a short intro to PHP',
            'is_new'  => true,
        ]
    ];

    abort_if(!isset($posts[$id]), 404);

    return view('posts.show', ['post' => $posts[$id]]);
})
//    ->where(['id' => '[0-9]+'])
    ->name('posts.show');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/customers', [CustomerController::class, 'index']);
Route::get('/customers/create', [CustomerController::class, 'create']);
Route::post('/customers', [CustomerController::class, 'store']);

