<?php

namespace Tests\Feature;

use App\Models\Covidstatistic;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class CovidstatisticTest extends TestCase
{
	use DatabaseTransactions;

	private User $user;

	protected function setUp(): Void
	{
		parent::setUp();
		$this->user = User::factory()->create();
	}

	public function test_searching_covidstatistics_table_by_country_name(): void
	{
		Covidstatistic::factory()->create([
			'country'   => ['en' => 'India', 'ka' => 'ინდოეთი'],
			'confirmed' => 1000,
		]);
		Covidstatistic::factory(4)->create();

		$kewyord = 'india';

		$response = $this->actingAs($this->user)->get(route('dashboard.countries', ['search'=>strtolower($kewyord)]));

		$country = $response->original->getData()['countries']->first()->country;

		$this->assertEquals(strtolower($country), strtolower($kewyord));
	}
}
