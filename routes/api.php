<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ApiPostController;
use App\Http\Controllers\ApiUserController;
use App\Http\Controllers\ApiTagController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/login', [AuthController::class, 'login']); //! V
Route::post('/register', [AuthController::class, 'register']); //! V

Route::get('/post', [ApiPostController::class, 'index']); //! V
Route::get('/latest', [ApiPostController::class, 'latest']); //! V
Route::get('/popular', [ApiPostController::class, 'popular']); //! V
Route::get('/unanswerd', [ApiPostController::class, 'unanswerd']); //! V

// Search
Route::get('/search', [ApiPostController::class, 'search']); //! V
Route::get('/search-popular', [ApiPostController::class, 'searchPopular']); //! V
Route::get('/search-unanswerd', [ApiPostController::class, 'searchUnanswerd']); //! V

// Category
Route::get('/interestGroup', [ApiPostController::class, 'interestgroup_show']); //! V

Route::prefix('/interestGroup')->group(function () {
    Route::get('/cow', [ApiPostController::class, 'show_cow']); //! V
    Route::get('/poultry', [ApiPostController::class, 'show_poultry']); //! V
    Route::get('/goat', [ApiPostController::class, 'show_goat']); //! V
    Route::get('/sheep', [ApiPostController::class, 'show_sheep']); //! V
    Route::get('/fish', [ApiPostController::class, 'show_fish']); //! V
    Route::get('/other', [ApiPostController::class, 'show_other']); //! V
});

// Post Detail
Route::get('/post-detail/{post:slug}', [ApiPostController::class, 'show']); //! V

// Profile
Route::get('/profile/{user:username}', [ApiUserController::class, 'showSpecific']); //! V

// Post by Tag
Route::get('/tag/{tag:slug}', [ApiTagController::class, 'show']); //! V

Route::prefix('/myProfile')->group(function () {
    // My Post
    Route::get('/mypost', [ApiPostController::class, 'myPost']); //! V
    // Saved Post
    Route::get('/savedpost', [ApiPostController::class, 'savedPost_show']); //! V
    // Discussion
    Route::get('/discussion', [ApiPostController::class, 'discussion']); //! V
    // Load More
    Route::get('/load-more-mypost', [ApiPostController::class, 'loadMoreMyPost']);
    Route::get('/load-more-savedpost', [ApiPostController::class, 'loadMoreSavedPost']);
    Route::get('/load-more-discussion', [ApiPostController::class, 'loadMoreDiscussion']);
    // Search
    Route::get('/search-mypost', [ApiPostController::class, 'search_mypost']);
    Route::get('/search-discussion', [ApiPostController::class, 'search_discussion']);
    Route::get('/search-savedpost', [ApiPostController::class, 'search_savedpost']);
    // Load More Search
    Route::get('/load-more-search-mypost', [ApiPostController::class, 'load_more_search_mypost']);
    Route::get('/load-more-search-discussion', [ApiPostController::class, 'load_more_search_discussion']);
    Route::get('/load-more-search-savedpost', [ApiPostController::class, 'load_more_search_savedpost']);

});

// Load More
Route::get('/load-more', [ApiPostController::class, 'loadMore']);
Route::get('/load-more-popular', [ApiPostController::class, 'loadMorePopular']);
Route::get('/load-more-unanswerd', [ApiPostController::class, 'loadMoreUnanswerd']);

// Load More Search
Route::get('/load-more-search', [ApiPostController::class, 'loadMoreSearchLatest']);
Route::get('/load-more-search-popular', [ApiPostController::class, 'loadMoreSearchPopular']);
Route::get('/load-more-search-unanswerd', [ApiPostController::class, 'loadMoreSearchUnanswerd']);

Route::middleware('auth:sanctum')->group(function () {
    // Profile
    Route::get('/profile', [UserController::class, 'edit']);
    Route::get('/myProfile', [UserController::class, 'show']);
    Route::patch('/profile', [UserController::class, 'update']);
    Route::patch('/password', [UserController::class, 'updatePassword']);
    Route::delete('/profile', [UserController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // Saved Post
    Route::post('/saved-post/{id}', [ApiPostController::class, 'savedPost']);

    // Post
    Route::get('/post/create', [ApiPostController::class, 'create']);
    Route::post('/post/store', [ApiPostController::class, 'store']);
    Route::get('/post/{post:slug}/edit', [ApiPostController::class, 'edit']);
    Route::patch('/post/{post:slug}/update', [ApiPostController::class, 'update']);
    Route::delete('/post/{post:slug}/delete', [ApiPostController::class, 'destroy']);

    // Upload Image
    Route::post('/upload', [ApiPostController::class, 'upload']);

    // Like
    Route::post('/like-post/{id}', [ApiPostController::class, 'likePost']);
    Route::post('/like-comment/{id}', [CommentController::class, 'likeComment']);

    // Slug
    Route::get('/post/create/checkSlug', [ApiPostController::class, 'checkSlug']);

    // Tag
    Route::post('/tag/store', [TagController::class, 'store']);
    Route::get('/tag/{slug}/edit', [TagController::class, 'edit']);
    Route::get('/post/create/tag', [TagController::class, 'search']);
    Route::get('/tag', [TagController::class, 'index']);

    // Comment
    Route::post('/comment', [CommentController::class, 'store']);
    Route::get('/comment/reload', [CommentController::class, 'reload']);
    Route::get('/comments', [CommentController::class, 'getMore']);
    Route::delete('/comment/delete', [CommentController::class, 'destroy']);

});
