<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GranitProductColors extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('granit_product_colors', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 45);
			$table->string('icon');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('granit_product_colors');
	}

}
