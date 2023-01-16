<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
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
Route::get('/post-detail/{post:slug}', [PostController::class, 'show'])->name('post.show');

// Profile
Route::get('/profile/{user:username}', [UserController::class, 'showSpecific'])->name('user.showSpecific');

// Tag
Route::get('/tag/{tag:slug}', [TagController::class, 'show'])->name('post.tag');

Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', [UserController::class, 'edit'])->name('profile.edit');
    Route::get('/myProfile', [UserController::class, 'show'])->name('profile.show');
    Route::patch('/profile', [UserController::class, 'update'])->name('profile.update');
    Route::patch('/password', [UserController::class, 'updatePassword'])->name('password.update');
    Route::delete('/profile', [UserController::class, 'destroy'])->name('profile.destroy');

    // Post
    Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
    Route::get('/post/{post:slug}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::patch('/post/{post:slug}/update', [PostController::class, 'update'])->name('post.update');
    Route::delete('/post/{post:slug}/delete', [PostController::class, 'destroy'])->name('post.destroy');

    // Upload Image
    Route::post('/upload', [PostController::class, 'upload'])->name('post.upload');

    // Like
    Route::post('/like-post/{id}', [PostController::class, 'likePost'])->name('like.post');
    Route::post('/like-comment/{id}', [CommentController::class, 'likeComment'])->name('like.comment');

    // Slug
    Route::get('/post/create/checkSlug', [PostController::class, 'checkSlug'])->name('post.checkSLug');

    // Tag
    Route::post('/tag/store', [TagController::class, 'store'])->name('tag.store');
    Route::get('/tag/{slug}/edit', [TagController::class, 'edit'])->name('tag.edit');
    Route::get('/post/create/tag', [TagController::class, 'search'])->name('tag.search');
    Route::get('/tag', [TagController::class, 'index'])->name('tag.getall');

    // Category
    // TODO #12 : Create Category

    // Comment
    Route::post('/comment', [CommentController::class, 'store'])->name('comment.store');
    Route::get('/comment/reload', [CommentController::class, 'reload'])->name('comment.reload');
    Route::get('/comments', [CommentController::class, 'getMore'])->name('comment.more');
    Route::delete('/comment/delete', [CommentController::class, 'destroy'])->name('comment.destroy');
});

require __DIR__ . '/auth.php';
