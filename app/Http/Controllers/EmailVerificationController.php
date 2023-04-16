<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class EmailVerificationController extends Controller
{
	public function verify(EmailVerificationRequest $request): RedirectResponse
	{
		$request->fulfill();

		Auth::logout();

		return redirect(route('signup.success'));
	}
}
