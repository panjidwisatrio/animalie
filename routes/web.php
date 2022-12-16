<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
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

Route::get('/', [PostController::class, 'index'])->name('dashboard');
Route::get('/interestGroup', [PostController::class, 'interestgroup_show'])->name('interestGroup');
Route::get('/post-detail/{slug}', [PostController::class, 'show'])->name('post.show');

// Tag
Route::get('/tag/{slug}', [TagController::class, 'index'])->name('tag');

Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', [UserController::class, 'edit'])->name('profile.edit');
    Route::get('/myProfile', [UserController::class, 'show'])->name('profile.show');
    Route::patch('/profile', [UserController::class, 'update'])->name('profile.update');
    Route::patch('/password', [UserController::class, 'updatePassword'])->name('password.update');
    Route::delete('/profile', [UserController::class, 'destroy'])->name('profile.destroy');

    // Post
    Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/post', [PostController::class, 'store'])->name('post.store');
    Route::post('/upload', [PostController::class, 'upload'])->name('post.upload');
    Route::get('/post/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::patch('/post/{id}', [PostController::class, 'update'])->name('post.update');

    Route::get('/tag/{slug}/edit', [TagController::class, 'edit'])->name('tag.edit');

    // Category
});

require __DIR__ . '/auth.php';
