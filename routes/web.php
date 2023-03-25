<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\PostController;
use  Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::group(["middleware" => ['auth']], function () {
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    //remove old posts
    Route::get('/posts/delete', [PostController::class, 'deletePostsFromTwoYears'])->name('posts.deletePostsFromTwoYears');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
    Route::get('/posts/ajax/{post}', [PostController::class, 'showAjax'])->name('posts.showAjax');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::get('/posts/restore/{post}', [PostController::class, 'restore'])->name('posts.restore');

    //Comments
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

Auth::routes();

Route::get('/auth/github/redirect',[LoginController::class, 'gitHub_Login'])->name('gitHub-Login');
Route::get('/auth/github/callback',[LoginController::class, 'github_callback']);

Route::get('/auth/google/redirect',[LoginController::class, 'google_Login'])->name('google-Login');
Route::get('/auth/google/callback',[LoginController::class, 'google_callback']);