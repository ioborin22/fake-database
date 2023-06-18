<?php

use App\Http\Controllers\API\CommentController;
use App\Http\Controllers\API\ContactController;
use App\Http\Controllers\API\EmployerController;
use App\Http\Controllers\API\ImageController;
use App\Http\Controllers\API\MessageController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/comments', [CommentController::class, 'index'])->name('comments.index');
Route::get('/comments/{id}', [CommentController::class, 'show'])->name('comments.show');

Route::get('/contacts/{id}', [ContactController::class, 'index'])->name('contacts.index');
Route::get('/contacts/{id}/added', [ContactController::class, 'added'])->name('contacts.added');
Route::get('/contacts/{id}/blocked', [ContactController::class, 'blocked'])->name('contacts.blocked');

Route::get('/employers', [EmployerController::class, 'index'])->name('employers.index');
Route::get('/employers/{id}', [EmployerController::class, 'show'])->name('employers.show');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

Route::get('/images', [ImageController::class, 'index'])->name('images.index');
Route::get('/images/{id}', [ImageController::class, 'show'])->name('images.show');

Route::get('/messages/{sender_id}', [MessageController::class, 'index'])->name('messages.index');
Route::get('/messages/{sender_id}/{receiver_id}', [MessageController::class, 'show'])->name('messages.show');

Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');

