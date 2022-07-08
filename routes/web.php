<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
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
Route::prefix('admin')->middleware('Admin')->group(function () {
    //posts
    Route::get('/posts/index', [PostController::class, 'index'])->name('admin.posts.index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('admin.posts.create');
    Route::post('/posts/store', [PostController::class, 'store'])->name('admin.posts.store');
    Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('admin.posts.edit');
    Route::post('/posts/{id}/update', [PostController::class, 'update'])->name('admin.posts.update');
    Route::get('/posts/{id}/destroy', [PostController::class, 'destroy'])->name('admin.posts.destroy');
    //users
    Route::get('/users/index', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/users/store', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/users/{id}/update', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/users/{id}/destroy', [UserController::class, 'destroy'])->name('admin.users.destroy');
});
//Auth
Route::get('register', [AuthController::class, 'showFormRegister'])->name('show-form-register');
Route::post('register', [AuthController::class, 'register'])->name('register');

Route::get('/', [AuthController::class, 'showFormLogin'])->name('show-form-login');
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('profile', [AuthController::class, 'showProfile'])->name('show-profile');
Route::put('profile', [AuthController::class, 'Profile'])->name('profile');

Route::get('/forget-password', [AuthController::class, 'forgetPass'])->name('forget_pass');
Route::post('/forget-password', [AuthController::class, 'postForgetPass']);

Route::get('/active/{user}/{token}', [AuthController::class, 'active'])->name('admin.user.active');

Route::get('/user', [AuthController::class, 'showFormUser'])->name('show-form-user');

