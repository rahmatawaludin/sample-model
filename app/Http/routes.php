<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::resource('home', 'HomeController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('/list-stock', function() {
	$begin = memory_get_usage();
	foreach (DB::table('products')->get() as $product) {
		if ( $product->stock > 20 ) {
			echo $product->name . ' : ' . $product->stock . '<br>';
		}
	}
	echo 'Total memory usage : ' . (memory_get_usage() - $begin);
});

Route::get('/list-stock-chunk', function() {
	$begin = memory_get_usage();
	DB::table('products')->chunk(100, function($products)
	{
	    foreach ($products as $product)
	    {
	        if ( $product->stock > 20 ) {
	        	echo $product->name . ' : ' . $product->stock . '<br>';
	        }
	    }
	});
	echo 'Total memory usage : ' . (memory_get_usage() - $begin);
});
