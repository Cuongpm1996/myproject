<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
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
