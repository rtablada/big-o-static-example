<?php

class FinanceTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = Faker\Factory::create();

		for ($i=0; $i < 2000; $i++) {
			Finance::create([
				'price' => $faker->randomNumber(0, 200000),
				'ttl' => $faker->randomNumber(0, 3000)
			]);
		}
	}

}
