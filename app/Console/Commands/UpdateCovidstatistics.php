<?php

namespace App\Console\Commands;

use App\Models\Covidstatistic;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class UpdateCovidstatistics extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'coronatime:update-covidstatistics';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Bring updated data to covidstatistics table';

	/**
	 * Execute the console command.
	 */
	public function handle()
	{
		$response = Http::get('https://devtest.ge/countries');

		$data = $response->json();

		if (!empty($data)) {
			foreach ($data as $item) {
				Covidstatistic::updateOrCreate(
					['id' => $item['code']],
					[
						'country->en' => $item['name']['en'],
						'country->ka' => $item['name']['ka'],
					]
				);
			}
		}

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
	}
}
