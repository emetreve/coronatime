<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Covidstat;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CountriesController extends Controller
{
	public function show(): View
	{
		return view('admin.countries', [
			'userName'  => Auth::user()->name,
			'language'  => App::getLocale() == 'ka' ? 'ქართული' : 'English',
			'covidstats'=> Covidstat::all(),
			'locale'    => App::getLocale(),
		]);
	}
}
