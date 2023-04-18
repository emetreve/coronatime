<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WorldwideController extends Controller
{
	public function show()
	{
		return view('admin.show', [
			'userName' => Auth::user()->name,
		]);
	}
}
