<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingsController;
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::middleware(['auth','web'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::post('/bulk-message-delete', [App\Http\Controllers\Admin\MessageController::class, 'bulkDeleteMessage'])->name('bulkDeleteMessage');
    Route::get('/compose-message', [App\Http\Controllers\Admin\MessageController::class, 'composeMessage'])->name('composeMessage');
    
    // Route::post('/users/update/{id}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('users-update');
    Route::resource('/users', App\Http\Controllers\Admin\UserController::class);
    Route::resource('/products', App\Http\Controllers\Admin\ProductsController::class);
    Route::resource('/testimonials', App\Http\Controllers\Admin\TestimonialsController::class);
    Route::resource('/faq', App\Http\Controllers\Admin\FaqController::class);
    Route::resource('/messages', App\Http\Controllers\Admin\MessageController::class);
    Route::resource('/settings', App\Http\Controllers\Admin\SettingsController::class);
});