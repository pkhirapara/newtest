<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/customers', [CustomerController::class, 'index']);
Route::get('/customers/create', [CustomerController::class, 'create']);
Route::post('/customers', [CustomerController::class, 'store']);

Route::get('/', [UserController::class, 'index']);

Route::view('/index', 'home.index')->name('home.index');

Route::view('/contact', 'home.contact')->name('home.contact');

$posts = [
    1 => [
        'title'        => 'Intro to Laravel',
        'content'      => 'This is a short intro to Laravel',
        'is_new'       => true,
        'has_comments' => true,
    ],
    2 => [
        'title'   => 'Intro to PHP',
        'content' => 'This is a short intro to PHP',
        'is_new'  => false,
    ]
];

Route::get('/posts', function () use ($posts) {
    return view('posts.index', ['posts' => $posts]);
})->name('posts.index');

Route::get('/posts/{id}', function ($id) use ($posts) {

    abort_if(!isset($posts[$id]), 404);

    return view('posts.show', ['post' => $posts[$id]]);
})
//    ->where(['id' => '[0-9]+'])
    ->name('posts.show');

Route::prefix('/fun')->name('fun.')->group(function () use ($posts) {

    Route::get('responses', function () use($posts) {
        return response($posts, 201)
            ->header('Content-Type', 'application/json')
            ->cookie('MY_COOKIE', 'Pk Hirpara', 3600);
    })->name('responses');

    Route::get('redirect', function () {
        return redirect('/contact');
    })->name('redirect');

    Route::get('back', function () {
        return back();
    })->name('back');

    Route::get('named-route', function () {
        return redirect()->route('posts.index');
    })->name('named-route');

    Route::get('away', function () {
        return redirect()->away('https://google.com');
    })->name('away');

    Route::get('/fun/json', function () use ($posts) {
        return response()->json($posts);
    });

    Route::get('/fun/download', function () {
        return response()->download(public_path('landscape.pdf'), 'pk.pdf');
    });

});




