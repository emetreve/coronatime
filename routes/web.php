<?php

use App\Http\Controllers\admin\CountriesController;
use App\Http\Controllers\admin\WorldwideController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PasswordController;
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

Route::controller(AuthController::class)->group(function () {
	Route::post('/signup', 'signup')->middleware('guest')->name('signup');
	Route::post('/', 'login')->middleware('guest')->name('login');
	Route::post('/logout', 'logout')->name('logout');
});

Route::view('/signup/success', 'auth.signup-success')->name('signup.success');
Route::get('/lang/{lang}', [LanguageController::class, 'index'])->name('lang.switch');

Route::group(['prefix' => 'email/verify'], function () {
	Route::view('', 'auth.verify-email')->middleware('auth')->name('verification.notice');
	Route::get('{id}/{hash}', [EmailVerificationController::class, 'verify'])->middleware(['auth', 'signed'])->name('verification.verify');
});

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'verified']], function () {
	Route::get('', [WorldwideController::class, 'show'])->name('dashboard');
	Route::get('countries', [CountriesController::class, 'show'])->name('dashboard.countries');
});

Route::group(['middleware' => 'guest'], function () {
	Route::view('/forgot-password', 'auth.forgot-password')->name('password.request');
	Route::post('/forgot-password', [PasswordController::class, 'requestChange'])->name('password.email');
	Route::post('/reset-password', [PasswordController::class, 'reset'])->name('password.update');
	Route::get('/reset-password/{token}', [PasswordController::class, 'showResetPasswordForm'])->name('password.reset');
	Route::view('/password-notice', 'auth.password-notice')->name('password.notice');
	Route::view('/password-success', 'auth.password-success')->name('password.success');
});
