<?php

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

Route::get('/users/all', [UserController::class, 'all'])->name('users.all');
Route::get('/users/users15', [UserController::class, 'users15'])->name('users.users15');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
