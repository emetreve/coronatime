<?php

namespace App\Http\Controllers;

use App\Http\Requests\password\ForgotPasswordRequest;
use Illuminate\Support\Facades\Password;

class PasswordController extends Controller
{
	public function requestChange(ForgotPasswordRequest $request)
	{
		$request->validate();

		$status = Password::sendResetLink(
			$request->only('email')
		);

		return $status === Password::RESET_LINK_SENT
			? back()->with(['status' => __($status)])
			: back()->withErrors(['email' => __($status)]);
	}
}
