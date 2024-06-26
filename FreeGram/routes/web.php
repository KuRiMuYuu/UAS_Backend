<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Auth\LoginController;

Route::resource('posts', PostController::class);
Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard');

Route::get('/', function () {
    return view('login');
});
Route::resource('posts', PostController::class);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [PostController::class, 'index'])->middleware(['auth'])->name('dashboard');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::post('/posts/{post}/like', [PostController::class, 'like'])->name('posts.like');
    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
    
});

Route::resource('posts', PostController::class);
Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard');

Route::middleware('throttle:5,1')->group(function () {
    Route::post('login', [LoginController::class, 'login'])->name('login');
});

require __DIR__.'/auth.php';