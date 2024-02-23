<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Test;
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

Route::get('/', [HomeController::class, 'index']);

Route::get('/hello', function () {
    return 'Hello World';
});

Route::get('/world', function () {
    return 'World';
});

Route::get('/about', [AboutController::class, 'about']);

Route::get('posts/{id}/comments/{comment}', function ($postId, $commentId) {
    return 'Post ke-' . $postId . ' Komentar ke-' . $commentId;
});

Route::get('article/{articleId}', [ArticleController::class, 'articles']);

Route::get(
    '/user/profile',
    [UserProfileController::class, 'show']
)->name('profile');

Route::get('user/{name?}', function ($name = null) {
    return 'Nama Saya : ' . $name;
});

Route::domain('{account}.example.com')->group(function () {
    Route::get('user/{id}', function ($account, $id) {
        return 'Account : ' . $account . ' ID : ' . $id;
    });
});

Route::get('/test', function () {
    return 'ok';
})->middleware([Test::class]);

Route::prefix('admin')->group(function () {
    Route::get('/user', [UserController::class, 'index']);
    Route::get('/post', [PostController::class, 'index']);
    Route::get('/event', [EventController::class, 'index']);
});

Route::redirect('ok', 'test');

Route::view('/welcome', 'welcome', ['name' => 'Galur Arasy L.']);

Route::resource('photos', PhotoController::class)->only(['create', 'store']);

Route::get('/greeting', [WelcomeController::class, 'greeting']);
