<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignupUserRequest;
use App\Models\User;

class AuthController extends Controller
{
	public function signup(SignupUserRequest $request)
	{
		$credentials = $request->validated();

		$rememberDevice = isset($request['remember']);
		$credentials['password'] = bcrypt($credentials['password']);

		$user = User::create($credentials);

		return redirect(route('login.index'))->with('success', 'Your account has been created.');
	}
}
