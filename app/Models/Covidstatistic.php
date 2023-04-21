<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Covidstatistic extends Model
{
	use HasFactory;

	use HasTranslations;

	public $translatable = ['country'];

	public $guarded = [];

	public function scopeFilter($query, array $filters)
	{
		foreach ($filters as $column => $dirct) {
			if ($column === 'search') {
				$query->where(
					fn ($query) => $query->whereRaw("LOWER(JSON_EXTRACT(country, '$." . app()->getLocale() . "')) LIKE ?", ['%' . strtolower(request('search')) . '%'])
				);
			} elseif ($column === 'country') {
				$query->orderBy($column . '->' . app()->getLocale(), $dirct);
			} else {
				$query->orderBy($column, $dirct);
			}
		}
	}
}
