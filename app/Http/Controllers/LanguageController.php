<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\RedirectResponse;

class LanguageController extends Controller
{
	public function index(string $lang): RedirectResponse
	{
		if (array_key_exists($lang, Config::get('languages'))) {
			Session::put('applocale', $lang);
		}
		return Redirect::back();
	}
}
