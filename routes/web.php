<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmailVerificationController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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

Route::view('/forgot-password', 'auth.forgot-password')->middleware('guest')->name('password.request');

Route::post('/forgot-password', function (Request $request) {
	$request->validate(['email' => 'required|email']);

	$status = Password::sendResetLink(
		$request->only('email')
	);

	return $status === Password::RESET_LINK_SENT
				? back()->with(['status' => __($status)])
				: back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

Route::post('/reset-password', function (Request $request) {
	$request->validate([
		'token'    => 'required',
		'password' => 'required|min:3|confirmed',
	]);

	$status = Password::reset(
		$request->only('email', 'password', 'password_confirmation', 'token'),
		function (User $user, string $password) {
			$user->forceFill([
				'password' => Hash::make($password),
			])->setRememberToken(Str::random(60));

			$user->save();
		}
	);

	return $status === Password::PASSWORD_RESET
				? redirect()->route('password.success')->with('status', __($status))
				: back()->withErrors(['password' => [__($status)]]);
})->middleware('guest')->name('password.update');

Route::get('/reset-password/{token}', function (Request $request, string $token) {
	return view('auth.reset-password', ['token' => $token, 'email'=>$request->query('email')]);
})->middleware('guest')->name('password.reset');

Route::view('/password-success', 'auth.password-success')->middleware('guest')->name('password.success');
