<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Covidstatistic;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CountriesController extends Controller
{
	public function show(): View
	{
		return view('admin.countries', [
			'userName'            => Auth::user()->name,
			'language'            => App::getLocale() == 'ka' ? 'ქართული' : 'English',
			'worldwideDeaths'     => number_format(Covidstatistic::sum('deaths')),
			'worldwideRecovered'  => number_format(Covidstatistic::sum('recovered')),
			'worldwideNew'        => number_format(Covidstatistic::sum('confirmed')),
			'countries'           => Covidstatistic::filter(request(['search', 'country', 'confirmed', 'deaths', 'recovered']))->get(),
			'locale'              => App::getLocale(),
		]);
	}
}
