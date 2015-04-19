<?php
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		$membership_type_id = [null, 1, 2, 3];

		foreach ( range(1,10) as $index ) {
			DB::table('customers')->insert([
				'name' => $faker->name,
				'phone' => $faker->phoneNumber,
				'address' => $faker->address,
				'membership_type_id' => $membership_type_id[rand(0,3)]
			]);
		}
	}
}
