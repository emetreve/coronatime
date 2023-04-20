<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Covidstat extends Model
{
	use HasFactory;

	use HasTranslations;

	public $translatable = ['country'];

	public $guarded = [];

	public function scopeFilter($query, array $filters)
	{
		if ($filters['search'] ?? false) {
			$query->where(
				fn ($query) => $query->whereRaw("LOWER(JSON_EXTRACT(country, '$." . app()->getLocale() . "')) LIKE ?", ['%' . strtolower(request('search')) . '%'])
			);
		}

		$query->when($filters['location'] ?? false, function ($query, $location) {
			if ($location == 'down') {
				$query->orderby('country->' . app()->getLocale(), 'desc');
			} else {
				$query->orderby('country->' . app()->getLocale(), 'asc');
			}
		});

		$query->when($filters['confirmed'] ?? false, function ($query, $confirmed) {
			if ($confirmed == 'down') {
				$query->orderby('confirmed', 'desc');
			} else {
				$query->orderby('confirmed', 'asc');
			}
		});

		$query->when($filters['deaths'] ?? false, function ($query, $deaths) {
			if ($deaths == 'down') {
				$query->orderby('deaths', 'desc');
			} else {
				$query->orderby('deaths', 'asc');
			}
		});

		$query->when($filters['recovered'] ?? false, function ($query, $recovered) {
			if ($recovered == 'down') {
				$query->orderby('recovered', 'desc');
			} else {
				$query->orderby('recovered', 'asc');
			}
		});
	}
}
