<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('approveUser',[App\Http\Controllers\HomeController::class, 'approveUser'])->name('approveUser');
Route::get('approve',[App\Http\Controllers\HomeController::class, 'approve'])->name('approve');
Route::get('unapprove',[App\Http\Controllers\HomeController::class, 'unapprove'])->name('unapprove');
Route::get('pending',[App\Http\Controllers\HomeController::class, 'pending'])->name('pending');