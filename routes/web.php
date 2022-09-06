<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ColabController;

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
Route::get('/success', function () {
    return view('success');
});

Route::get('test', [ColabController::class, 'test'])->name('test');
Route::post('add/form', [ColabController::class, 'store'])->name('forms.stores');
Route::post('saveForm', [ColabController::class, 'store'])->name('forms.saveForm');
Route::post('saveNote', [ColabController::class, 'saveNote'])->name('forms.saveNote');
