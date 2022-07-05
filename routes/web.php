<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});
//posts
Route::get('admin/posts/index', [PostController::class, 'index'])->name('admin.posts.index');
Route::get('admin/posts/create', [PostController::class, 'create'])->name('admin.posts.create');
Route::post('admin/posts/store', [PostController::class, 'store'])->name('admin.posts.store');
Route::get('admin/posts/{id}/edit', [PostController::class, 'edit'])->name('admin.posts.edit');
Route::post('admin/posts/{id}/update', [PostController::class, 'update'])->name('admin.posts.update');
Route::get('admin/posts/{id}/destroy', [PostController::class, 'destroy'])->name('admin.posts.destroy');

//users
Route::get('admin/users/index', [UserController::class, 'index'])->name('admin.users.index');
Route::get('admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
Route::post('admin/users/store', [UserController::class, 'store'])->name('admin.users.store');
Route::get('admin/users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
Route::put('admin/users/{id}/update', [UserController::class, 'update'])->name('admin.users.update');
Route::delete('admin/users/{id}/destroy', [UserController::class, 'destroy'])->name('admin.users.destroy');
