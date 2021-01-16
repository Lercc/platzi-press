<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Aplication\PostController;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [PageController::class, 'posts'])->name('blog.posts');
Route::get('blog/{post}', [PageController::class, 'post'])->name('blog.post');

Route::resource('posts', PostController::class)->middleware('auth')->except('show');