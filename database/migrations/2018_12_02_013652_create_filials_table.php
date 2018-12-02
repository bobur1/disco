<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFilialsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('filials', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('company', 200);
			$table->text('desc', 65535);
			$table->string('lat', 50);
			$table->string('long', 50);
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('filials');
	}

}
