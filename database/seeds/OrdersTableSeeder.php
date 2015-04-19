<?php
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder {

	public function run()
	{
		foreach ( range(1,10) as $index ) {
			DB::insert('insert into customers (name, phone, address) values (:name, :phone, :address)', [
				'name' => $faker->name,
				'phone' => $faker->phoneNumber,
				'address' => $faker->address
			]);
		}
	}
}
