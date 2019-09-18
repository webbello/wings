<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Blog\PostController;

// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('categories', 'CategoryController');

Route::get('blog/posts', [PostController::class, 'allPost'])->name('blog.posts.index');
Route::get('blog/posts/create', [PostController::class, 'create'])->name('blog.posts.create');
Route::post('blog/posts/store', [PostController::class, 'store'])->name('blog.posts.store');

// Specific Post
Route::group(['prefix' => 'blog/posts/{post}'], function () {
    // Post
    Route::get('/', [PostController::class, 'show'])->name('blog.posts.show');
    Route::get('edit', [PostController::class, 'edit'])->name('blog.posts.edit');
    Route::patch('/', [PostController::class, 'update'])->name('blog.posts.update');
    Route::delete('/', [PostController::class, 'destroy'])->name('blog.posts.destroy');
});