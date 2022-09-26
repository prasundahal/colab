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
    Route::resource('/users', App\Http\Controllers\Admin\UserController::class);
    Route::post('/colab/saveNote',[App\Http\Controllers\Admin\ColabController::class, 'saveNote'])->name('colab.saveNote');
    Route::get('/colab/detail/{id}',[App\Http\Controllers\Admin\ColabController::class, 'show'])->name('colab.detail');
    Route::resource('/colab', App\Http\Controllers\Admin\ColabController::class);
    Route::resource('/questions', App\Http\Controllers\Admin\QuestionsController::class);
});