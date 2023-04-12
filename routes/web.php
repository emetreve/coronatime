<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'auth.index')->middleware('guest')->name('login.index');
Route::view('/signup', 'auth.signup')->middleware('guest')->name('signup.index');

Route::post('/signup', [AuthController::class, 'signup'])->name('signup')->middleware('guest');

// Auth::routes(['verify'=>true]);
