<?php

namespace Tests\Feature;

use App\Models\Covidstatistic;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateCovidStatisticsTest extends TestCase
{
	use RefreshDatabase;

	public function test_country_names_codes_deaths_recovere_and_new_cases_are_really_saved_in_database(): void
	{
		Http::fake([
			'devtest.ge/countries' => Http::response([
				[
					'code' => 'GE',
					'name' => [
						'en' => 'Georgia',
						'ka' => 'საქართველო',
					],
				],
				[
					'code' => 'NO',
					'name' => [
						'en' => 'Norway',
						'ka' => 'ნორვეგია',
					],
				],
			], 200),
		]);

		$this->artisan('coronatime:update-covidstatistics');
		$this->assertDatabaseHas('covidstatistics', [
			'id'          => 'GE',
			'country->en' => 'Georgia',
			'country->ka' => 'საქართველო',
		]);
		$this->assertDatabaseHas('covidstatistics', [
			'id'          => 'NO',
			'country->en' => 'Norway',
			'country->ka' => 'ნორვეგია',
		]);
		$this->assertDatabaseCount('covidstatistics', 2);

		Http::fake([
			'https://devtest.ge/get-country-statistics' => Http::response([
				'confirmed' => 1,
				'recovered' => 5,
				'deaths'    => 0,
			]),
		]);

		$countries = Covidstatistic::all();
		foreach ($countries as $country) {
			$postData = (object) [
				'code'=> $country->getAttributes()['id'],
			];
			$response = Http::post('https://devtest.ge/get-country-statistics', $postData);
			$responseData = $response->json();
			$country->fill([
				'confirmed' => $responseData['confirmed'],
				'recovered' => $responseData['recovered'],
				'deaths'    => $responseData['deaths'],
			]);
			$country->save();
		}

		$this->assertDatabaseHas('covidstatistics', [
			'id'          => 'GE',
			'country->en' => 'Georgia',
			'country->ka' => 'საქართველო',
			'confirmed'   => 1,
			'recovered'   => 5,
			'deaths'      => 0,
		]);
	}
}
