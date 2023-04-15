<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmailVerificationController;
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

Route::post('/signup', [AuthController::class, 'signup'])->middleware('guest')->name('signup');
Route::post('/', [AuthController::class, 'login'])->middleware('guest')->name('login');

Route::view('/signup/success', 'auth.signup-success')->name('signup.success');
Route::view('/email/verify', 'auth.verify-email')->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])->middleware(['auth', 'signed'])->name('verification.verify');

Route::view('/dashboard', 'admin.show')->middleware(['auth', 'verified'])->name('dashboard');

Route::view('/forgot-password', 'auth.forgot-password')->middleware('guest')->name('password.reset.index');
