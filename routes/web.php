<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Post endpoints
Route::get('/new-post', [App\Http\Controllers\PostController::class, 'index'])->name('new-post');
Route::get('/posts', [App\Http\Controllers\PostController::class, 'read'])->name('new-post');
Route::get('/post/{id}', [App\Http\Controllers\PostController::class, 'show'])->name('show-post');
Route::delete('/post/{id}', [App\Http\Controllers\PostController::class, 'delete'])->name('delete-post');
Route::put('/post', [App\Http\Controllers\PostController::class, 'update'])->name('update-post');
Route::post('/post', [App\Http\Controllers\PostController::class, 'create'])->name('create-post');
