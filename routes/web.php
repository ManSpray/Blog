<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogPostController;
// use Illuminate\Support\Facades\DB;

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

Route::get('/', function () {return view('welcome');})->name('index');
Route::get('/about-us', function () {return view('about');})->name('regular.about');

Route::get('/posts', [BlogPostController::class, 'index'])->name('regular.blogposts'); 
Route::get('/posts/{id}', [BlogPostController::class, 'show'])->name('posts.show'); //updatinimui
Route::post('/posts', [BlogPostController::class, 'store']);
Route::delete('/posts/{id}', [BlogPostController::class, 'destroy'])->name('posts.destroy');
Route::put('/posts/{id}', [BlogPostController::class, 'update'])->name('posts.update'); //update route
Route::post('/posts/{id}/comments', [BlogPostController::class, 'storePostComment'])->name('posts.comments.store'); //comment route

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('regular.home');