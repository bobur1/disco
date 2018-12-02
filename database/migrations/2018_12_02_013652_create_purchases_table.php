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
			$table->increments('id');
			$table->integer('user_ID')->unsigned();
			$table->string('product_category', 100);
			$table->string('product_name', 256);
			$table->timestamps();
			$table->string('company', 256);
			$table->string('filial', 50);
			$table->string('check_number', 50);
			$table->string('quantity', 6)->nullable();
			$table->string('weight', 6)->nullable();
			$table->string('volume', 50)->nullable();
			$table->string('cost', 50)->nullable();
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
