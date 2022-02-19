<?php

use App\Http\Controllers\admin\IndexController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\ContactController;

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
    return view('index');
});
Route::get('/about-us', function () {
    return view('about-us');
});

Route::get('/feature', function () {
    return view('feature');
});
Route::get('/chef', function () {
    return view('chef');
});

Route::get('/booking', function () {
    return view('book');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index']);
Route::post('/contact-us-store', [App\Http\Controllers\ContactController::class, 'store'])->name('contact-us');

Route::get('/user-profile', [App\Http\Controllers\ProfileController::class, 'profile']);
Route::post('/user-profile-update', [App\Http\Controllers\ProfileController::class, 'update'])->name('users.edit');


Route::middleware(['IsAdmin'])->group(function () {
    Route::get('/admin/dashboard', [IndexController::class, 'index']);
    Route::delete('/admin/dashboard/{userId}/destroy/{pivotId}', [IndexController::class, 'destroy'])->name('index.destroy');

    Route::put('/admin/dashboard/{userId}/update/{pivotId}', [IndexController::class, 'update'])->name('index.update');
});