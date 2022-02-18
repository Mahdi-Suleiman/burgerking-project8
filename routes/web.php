<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('index');
});
Route::get('/about-us', function () {
    return view('about-us');
});
Route::get('/profile', function () {
    return view('profile');
});
Route::get('/feature', function () {
    return view('feature');
});
Route::get('/chef', function () {
    return view('chef');
});
Route::get('/contact', function () {
    return view('contact-us');
});
Route::get('/booking', function () {
    return view('book');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
