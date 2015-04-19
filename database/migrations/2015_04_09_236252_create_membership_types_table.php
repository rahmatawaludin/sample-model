<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembershipTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('membership_types', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('type');
			$table->integer('discount');
			$table->integer('yearly_fee');
		});

		Schema::table('customers', function(Blueprint $table)
		{
			$table->integer('membership_type_id')->unsigned()->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('customers', function(Blueprint $table)
		{
			$table->dropColumn('membership_type_id');
		});

		Schema::drop('membership_types');
	}

}
