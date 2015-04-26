<?php
use Illuminate\Database\Seeder;

class SampleOrderSeeder extends Seeder {

	public function run()
	{
		// membuat order
		foreach ( range(1,3) as $order ) {
			DB::table('orders')->insert(['customer_id'=>rand(1,3), 'paid_at'=>new DateTime]);
			// membuat order product
			foreach ( range(1,2) as $product ) {
				DB::table('orders_products')->insert(['order_id'=>$order, 'product_id'=>rand(1,7)]);
			}
		}
	}
}
