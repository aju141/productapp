<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\CategoryController;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
// admin dashboard route

Route::view('admin', 'admin/dashboard')
    ->middleware(['auth', 'verified','AdminMiddleware'])
    ->name('admindashboard');

Route::view('profile', 'admin/profile')
    ->middleware(['auth','verified','AdminMiddleware'])
    ->name('adminprofile');
    // user profile
    Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
// auth permission admin route
Route::group(['middleware' => ['auth', 'verified','AdminMiddleware']], function() {
    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);
});



