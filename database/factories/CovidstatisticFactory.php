<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as KaFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Covidstatistic>
 */
class CovidstatisticFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		return [
			'id'      => $this->faker->unique()->uuid,
			'country' => [
				'en' => $this->faker->country(),
				'ka' => KaFactory::create('ka_GE')->realText(10),
			],
			'confirmed'     => $this->faker->numberBetween(0, 10000),
			'deaths'        => $this->faker->numberBetween(0, 1000),
			'recovered'     => $this->faker->numberBetween(0, 5000),
		];
	}
}
