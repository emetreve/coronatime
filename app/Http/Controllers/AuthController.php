<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignupUserRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
	public function signup(SignupUserRequest $request)
	{
		$credentials = $request->validated();
		$credentials['password'] = bcrypt($credentials['password']);

		$user = User::create($credentials);
		Auth::loginUsingId($user->id);

		event(new Registered($user));

		return redirect(route('verification.notice'));
	}

	public function login()
	{
		// $credentials = $request->validated();

		// if (auth()->attempt($credentials))
		// {
		// 	return redirect(route('dashboard'))->with('success', __('flash-messages.welcome_back'));
		// }

		// return back()->withInput()->withErrors(['email' => __('auth.failed')]);
	}
}
