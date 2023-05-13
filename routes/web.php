<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\SavedPostController;
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

// Home & Sorting
Route::get('/', [PostController::class, 'index'])->name('dashboard');
Route::get('/latest', [PostController::class, 'latest'])->name('latest');
Route::get('/popular', [PostController::class, 'popular'])->name('popular');
Route::get('/unanswerd', [PostController::class, 'unanswerd'])->name('unanswerd');

// Search
Route::get('/search', [PostController::class, 'search'])->name('search');
Route::get('/search-popular', [PostController::class, 'searchPopular'])->name('searchPopular');
Route::get('/search-unanswerd', [PostController::class, 'searchUnanswerd'])->name('searchUnanswerd');

// Category
Route::get('/interestGroup', [PostController::class, 'interestgroup_show'])->name('interestGroup');
Route::prefix('/interestGroup')->group(function () {
    Route::get('/cow', [PostController::class, 'show_cow'])->name('interestGroup_cow');
    Route::get('/poultry', [PostController::class, 'show_poultry'])->name('interestGroup_poultry');
    Route::get('/goat', [PostController::class, 'show_goat'])->name('interestGroup_goat');
    Route::get('/sheep', [PostController::class, 'show_sheep'])->name('interestGroup_sheep');
    Route::get('/fish', [PostController::class, 'show_fish'])->name('interestGroup_fish');
    Route::get('/other', [PostController::class, 'show_other'])->name('interestGroup_other');
});

// Post Detail
Route::get('/post-detail/{post:slug}', [PostController::class, 'show'])->name('post.show');

// Profile
Route::get('/profile/{user:username}', [UserController::class, 'showSpecific'])->name('user.showSpecific');

// Tag
Route::get('/tag/{tag:slug}', [TagController::class, 'show'])->name('post.tag');

Route::prefix('/myProfile')->group(function () {
    // My Post
    Route::get('/mypost', [PostController::class, 'myPost'])->name('myPost');
    // Saved Post
    Route::get('/savedpost', [PostController::class, 'savedPost_show'])->name('savedPost.show');
    // Discussion
    Route::get('/discussion', [PostController::class, 'discussion'])->name('discussion');
    // Load More
    Route::get('/load-more-mypost', [PostController::class, 'loadMoreMyPost'])->name('myPost.loadMore');
    Route::get('/load-more-savedpost', [PostController::class, 'loadMoreSavedPost'])->name('savedPost.loadMore');
    Route::get('/load-more-discussion', [PostController::class, 'loadMoreDiscussion'])->name('discussion.loadMore');
    // Search
    Route::get('/search-mypost', [PostController::class, 'search_mypost'])->name('searchMyPost');
    Route::get('/search-discussion', [PostController::class, 'search_discussion'])->name('searchDiscussion');
    Route::get('/search-savedpost', [PostController::class, 'search_savedpost'])->name('searchSavedPost');
    // Load More Search
    Route::get('/load-more-search-mypost', [PostController::class, 'load_more_search_mypost'])->name('loadMoreSearchMyPost');
    Route::get('/load-more-search-discussion', [PostController::class, 'load_more_search_discussion'])->name('loadMoreSearchDiscussion');
    Route::get('/load-more-search-savedpost', [PostController::class, 'load_more_search_savedpost'])->name('loadMoreSearchSavedPost');

});

// Load More
Route::get('/load-more', [PostController::class, 'loadMore'])->name('loadMore');
Route::get('/load-more-popular', [PostController::class, 'loadMorePopular'])->name('loadMorePopular');
Route::get('/load-more-unanswerd', [PostController::class, 'loadMoreUnanswerd'])->name('loadMoreUnanswerd');

// Load More Search
Route::get('/load-more-search', [PostController::class, 'loadMoreSearchLatest'])->name('loadMoreSearch');
Route::get('/load-more-search-popular', [PostController::class, 'loadMoreSearchPopular'])->name('loadMoreSearchPopular');
Route::get('/load-more-search-unanswerd', [PostController::class, 'loadMoreSearchUnanswerd'])->name('loadMoreSearchUnanswerd');

Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', [UserController::class, 'edit'])->name('profile.edit');
    Route::get('/myProfile', [UserController::class, 'show'])->name('profile.show');
    Route::patch('/profile', [UserController::class, 'update'])->name('profile.update');
    Route::patch('/password', [UserController::class, 'updatePassword'])->name('password.update');
    Route::delete('/profile', [UserController::class, 'destroy'])->name('profile.destroy');

    // Saved Post
    Route::post('/saved-post/{id}', [PostController::class, 'savedPost'])->name('savedPost');

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

    // Comment
    Route::post('/comment', [CommentController::class, 'store'])->name('comment.store');
    Route::get('/comment/reload', [CommentController::class, 'reload'])->name('comment.reload');
    Route::get('/comments', [CommentController::class, 'getMore'])->name('comment.more');
    Route::delete('/comment/delete', [CommentController::class, 'destroy'])->name('comment.destroy');

});

require __DIR__ . '/auth.php';