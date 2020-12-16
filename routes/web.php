<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
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

Route::prefix('admin')->namespace('Admin')->group(function (){
    
    Route::prefix('users')->group(function (){
        Route::get('/', [AdminUserController::class, 'index'])->name('admin.users');
        Route::get('/create', [AdminUserController::class, 'create'])->name('admin.users.create');
        Route::post('/', [AdminUserController::class, 'store'])->name('admin.users.store');
        Route::get('/{user}/edit', [AdminUserController::class, 'edit'])->name('admin.users.edit');
        Route::put('/{user}/update', [AdminUserController::class, 'update'])->name('admin.users.update');
    });

    Route::prefix('posts')->group(function (){
        Route::get('/', [AdminPostController::class, 'index'])->name('admin.posts');
        Route::get('/create', [AdminPostController::class, 'create'])->name('admin.posts.create');
        Route::post('/', [AdminPostController::class, 'store'])->name('admin.posts.store');
        Route::get('/{post}/edit', [AdminPostController::class, 'edit'])->name('admin.posts.edit');
        Route::put('/{post}/update', [AdminPostController::class, 'update'])->name('admin.posts.update');
    });

    Route::prefix('categories')->group(function (){
        Route::get('/', [AdminCategoryController::class, 'index'])->name('admin.categories');
        Route::get('/create', [AdminCategoryController::class, 'create'])->name('admin.categories.create');
        Route::post('/', [AdminCategoryController::class, 'store'])->name('admin.categories.store');
        Route::get('/{category}/edit', [AdminCategoryController::class, 'edit'])->name('admin.categories.edit');
        Route::put('/{category}/update', [AdminCategoryController::class, 'update'])->name('admin.categories.update');
    });

});
