<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;

class EmailVerificationController extends Controller
{
	public function verify(EmailVerificationRequest $request)
	{
		$request->fulfill();

		Auth::logout();

		return redirect(route('signup.success'));
	}
}
