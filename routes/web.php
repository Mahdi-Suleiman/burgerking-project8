<?php

use App\Http\Controllers\admin\IndexController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['IsAdmin'])->group(function () {
    // Route::get('/admin/dashboard', function () {
    //     return view('layouts.admin.index');
    // });
    Route::get('/admin/dashboard', [IndexController::class, 'index']);
    Route::delete('/admin/dashboard/{id}', [IndexController::class, 'destroy'])->name('index.destroy');
});

// Route::get('/admin/dashboard', function () {
//     return view('layouts.admin.index');
// });