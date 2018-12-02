<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDiscountListTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('discount_list', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 100);
			$table->string('max_amount', 100);
			$table->string('min_amount', 100);
			$table->string('company', 200);
			$table->boolean('number')->nullable()->default(0);
			$table->boolean('created_at')->nullable()->default(0);
			$table->boolean('updated_at')->nullable()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('discount_list');
	}

}
