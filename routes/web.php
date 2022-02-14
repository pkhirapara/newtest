<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContestEntryController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;

//Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home.index');

//Route::get('/customers', [CustomerController::class, 'index']);
//Route::get('/customers/create', [CustomerController::class, 'create']);
//Route::post('/customers', [CustomerController::class, 'store']);

//Route::get('/', [UserController::class, 'index']);

//Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');

Route::get('/singleActionController', AboutController::class);


Route::resource('posts', PostsController::class);

Route::post('/contest', [ContestEntryController::class, 'store'])->name('contest.store');
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
