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
			$table->integer('product_id')->unsigned();
			$table->foreign('product_id')->references('id')->on('granit_products')->onDelete('cascade')->onUpdate('cascade');
			$table->string('thumbnail');
			$table->string('image');
			$table->decimal('price',10,2);
			$table->decimal('characteristic_price',10,2);
			$table->string('state')->default('published');
			$table->integer('ordering');
			$table->integer('created_by')->unsigned();
			$table->foreign('created_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
		Schema::drop('granit_product_colors');
	}

}
