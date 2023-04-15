<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\SignupUserRequest;
use App\Models\User;
use Illuminate\Validation\ValidationException;
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

	public function login(LoginUserRequest $request): RedirectResponse
	{
		$attributes = $request->validated();

		$rememberMe = $attributes['remember'];

		$user = User::where('name', $attributes['username'])
		->orWhere('email', $attributes['username'])->first();

		if ($user && !$user->email_verified_at) {
			throw ValidationException::withMessages([
				'username' => [__('auth.not_verified')],
			]);
		}

		if (auth()->attempt(['name' => $attributes['username'], 'password' => $attributes['password']], $rememberMe)) {
			return redirect(route('dashboard'));
		} elseif (auth()->attempt(['email' => $attributes['username'], 'password' => $attributes['password']], $rememberMe)) {
			return redirect(route('dashboard'));
		} else {
			throw ValidationException::withMessages([
				'username' => [__('auth.failed')],
			]);
		}

		session()->regenerate();
	}
}
