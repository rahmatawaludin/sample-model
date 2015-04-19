<?php
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class SampleChunkSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		$products = ["Accord", "Civic", "City", "CR-V", "Jazz", "Freed", "Mobilio"];
		$descriptions = ["Tipe manual", "Tipe Otomatis"];

		for ( $i=0; $i < 10000; $i++ ) {
			DB::insert('insert into products (name, description, price, stock) values (:name, :description, :price, :stock)', [
				'name' => $products[rand(0,6)] . ' ' . $faker->firstNameMale,
				'description' => $descriptions[rand(0,1)],
				'price' => rand(100,800) * 1000000,
				'stock' => rand(2,40)
			]);
		}

		$this->command->info('Berhasil menambah 10.000 mobil!');
	}

}
