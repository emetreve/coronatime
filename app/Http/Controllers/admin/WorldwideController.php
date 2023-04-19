<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Covidstat;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class WorldwideController extends Controller
{
	public function show(): View
	{
		return view('admin.show', [
			'userName'  => Auth::user()->name,
			'language'  => App::getLocale() == 'ka' ? 'ქართული' : 'English',
			'deaths'    => number_format(Covidstat::sum('deaths')),
			'recovered' => number_format(Covidstat::sum('recovered')),
			'newCases'  => number_format(Covidstat::sum('confirmed')),
		]);
	}
}
