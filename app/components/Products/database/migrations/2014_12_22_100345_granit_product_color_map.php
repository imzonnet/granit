<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GranitProductColorMap extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('granit_product_color_map', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 45);
			$table->integer('product_id')->unsigned();
			$table->foreign('product_id')->references('id')->on('granit_products')->onDelete('cascade')->onUpdate('cascade');
			$table->integer('color_id')->unsigned();
			$table->foreign('color_id')->references('id')->on('granit_product_colors')->onDelete('cascade')->onUpdate('cascade');
			$table->string('image');
			$table->decimal('price',10,2);
			$table->integer('sale')->unsigned()->default(0);
			$table->decimal('characteristic_price',10,2);
			$table->string('status')->default('published');
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
		Schema::drop('granit_product_color_map');
	}

}
