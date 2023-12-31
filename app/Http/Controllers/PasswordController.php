<?php

namespace App\Http\Controllers;

use App\Http\Requests\password\ForgotPasswordRequest;
use App\Http\Requests\password\ResetPasswordRequest;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PasswordController extends Controller
{
	public function requestChange(ForgotPasswordRequest $request): RedirectResponse
	{
		$request->validated();

		$status = Password::sendResetLink(
			$request->only('email')
		);

		return $status === Password::RESET_LINK_SENT
			? redirect(route('password.notice'))->with(['status' => __($status)])
			: back()->withErrors(['email' => __($status)]);
	}

	public function reset(ResetPasswordRequest $request): RedirectResponse
	{
		$request->validated();

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
	}

	public function showResetPasswordForm(Request $request, string $token): View
	{
		$email = $request->query('email');
		return view('auth.reset-password', ['token' => $token, 'email' => $email]);
	}
}
