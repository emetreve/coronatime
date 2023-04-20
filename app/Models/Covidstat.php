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

		$query->when($filters['country'] ?? false, function ($query, $dirct) {
			$sortColumn = 'country';
			$query->orderBy($sortColumn . '->' . app()->getLocale(), $dirct);
		});

		$query->when($filters['confirmed'] ?? false, function ($query, $dirct) {
			$sortColumn = 'confirmed';
			$query->orderBy($sortColumn, $dirct);
		});

		$query->when($filters['deaths'] ?? false, function ($query, $dirct) {
			$sortColumn = 'deaths';
			$query->orderBy($sortColumn, $dirct);
		});

		$query->when($filters['recovered'] ?? false, function ($query, $dirct) {
			$sortColumn = 'recovered';
			$query->orderBy($sortColumn, $dirct);
		});
	}
}
