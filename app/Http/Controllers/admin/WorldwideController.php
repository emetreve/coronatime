<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class WorldwideController extends Controller
{
	public function show(): View
	{
		return view('admin.show', [
			'userName'  => Auth::user()->name,
			'language'  => Config::get('languages')[App::getLocale()],
			'deaths'    => number_format(DB::table('covidstats')->sum('deaths')),
			'recovered' => number_format(DB::table('covidstats')->sum('recovered')),
			'newCases'  => number_format(DB::table('covidstats')->sum('confirmed')),
		]);
	}
}
