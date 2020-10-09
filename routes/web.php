<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Backend\PostController;

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

// Routing in Laravel 7
// Route::get('/', 'PageController@posts');
// Route::get('/blog/{post}', 'PageController@post')->name('post');

// New routing in Laravel 8
Route::get('/', [PageController::class, 'posts']);
Route::get('/blog/{post}', [PageController::class, 'post'])->name('post');
Route::resource('/posts', PostController::class)->middleware('auth')->except('show');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
