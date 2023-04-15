<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\SignupUserRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
	public function signup(SignupUserRequest $request): RedirectResponse
	{
		$credentials = $request->validated();
		$credentials['password'] = bcrypt($credentials['password']);

		$user = User::create($credentials);
		Auth::loginUsingId($user->id);

		event(new Registered($user));

		return redirect(route('verification.notice'));
	}

	public function login(LoginUserRequest $request)
	{
		dd($request);
		$username = $request->input('username');
		$password = $request->input('password');
	}
}
