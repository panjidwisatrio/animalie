<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

//Test Route
Route::get('interestGroup', function () {
    return view('interestGroup');
})->name('interestGroup');

Route::get('tagsPage', function () {
    return view('tagsPage');
})->name('tagsPage');

Route::get('/', [PostController::class, 'index'])->name('dashboard');
Route::get('/post/{id}', [PostController::class, 'show'])->name('show');

Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Post
    Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/post', [PostController::class, 'store'])->name('store');
    Route::get('/post/{id}/edit', [PostController::class, 'edit'])->name('edit');
    Route::patch('/post/{id}', [PostController::class, 'update'])->name('update');

    // Tag
    Route::get('/tag/{slug}', [TagController::class, 'index'])->name('tag');
    Route::get('/tag/{slug}/edit', [TagController::class, 'edit'])->name('tag.edit');

    // Category
});

require __DIR__ . '/auth.php';
