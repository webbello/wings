<?php

use App\Http\Controllers\Backend\EventController;
use App\Http\Controllers\Blog\PostController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\User\AccountController;
use App\Http\Controllers\Frontend\User\ProfileController;
use App\Http\Controllers\Frontend\User\DashboardController;
use App\Http\Controllers\Backend\AlbumController;

/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('blog/{category?}', [PostController::class, 'all'])->name('blog.index');
Route::get('blog/posts/{post}', [PostController::class, 'single'])->name('blog.single');
Route::get('events', [EventController::class, 'frontend_index'])->name('events.index');
Route::get('events/{id}', [EventController::class, 'frontend_show'])->name('events.show');
Route::post('events/store', [EventController::class, 'store'])->name('events.store');
Route::get('photo_gallery', [AlbumController::class, 'frontend_index'])->name('photo.gallery.index');
Route::get('photo_gallery/{id}', [AlbumController::class, 'frontend_show'])->name('photo.gallery.show');
Route::get('contact', [ContactController::class, 'index'])->name('contact');
Route::post('contact/send', [ContactController::class, 'send'])->name('contact.send');

//pages
Route::get('/our_mission', [HomeController::class, 'page_our_mission'])->name('our_mission');
Route::get('/our_vision', [HomeController::class, 'page_our_vision'])->name('our_vission');
Route::get('/our_activities', [HomeController::class, 'page_our_activities'])->name('our_activities');
Route::get('/mission_50k', [HomeController::class, 'page_mission_50k'])->name('mission_50k');
Route::get('/president_message', [HomeController::class, 'page_president_message'])->name('president_message');

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 * These routes can not be hit if the password is expired
 */
Route::group(['middleware' => ['auth', 'password_expires']], function () {
    Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
        // User Dashboard Specific
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // User Account Specific
        Route::get('account', [AccountController::class, 'index'])->name('account');

        // User Profile Specific
        Route::patch('profile/update', [ProfileController::class, 'update'])->name('profile.update');
    });
});
