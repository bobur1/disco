<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePurchasesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('purchases', function(Blueprint $table)
		{
			$table->increments('ID');
			$table->integer('user_ID')->unsigned();
			$table->string('product_category', 100);
			$table->string('product_name', 256);
			$table->timestamps();
			$table->string('company', 256);
			$table->integer('filial')->unsigned();
			$table->integer('check_number')->unsigned();
			$table->integer('quantity')->unsigned()->nullable();
			$table->integer('weight')->unsigned()->nullable();
			$table->integer('volume')->unsigned()->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('purchases');
	}

}
