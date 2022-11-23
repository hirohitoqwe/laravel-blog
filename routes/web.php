<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use \App\Http\Controllers\CommentController;
use \App\Http\Controllers\AdminController;

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
Route::middleware(['auth', 'admin'])->prefix("admin")->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::patch('/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    Route::delete('/users/{user}', [AdminController::class, 'userDelete'])->name('admin.user.delete');
});
Route::get('/', [App\Http\Controllers\PostController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();
Route::resource('posts', PostController::class);
Route::post('/posts/{post}/comment', [CommentController::class, 'store'])->name('comment.store')->middleware('auth');


