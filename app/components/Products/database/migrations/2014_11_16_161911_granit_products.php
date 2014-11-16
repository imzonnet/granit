<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GranitProducts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('granit_products', function(Blueprint $table) {
			$table->increments('id');
			$table->string('code', 10);
			$table->string('name');
			$table->string('alias')->unique();
			$table->integer('cat_id')->unsigned();
			$table->foreign('cat_id')->references('id')->on('granit_product_categories')->onDelete('cascade')->onUpdate('cascade');
			$table->string('thumbnail');
			$table->string('image');
			$table->decimal('price',10,2);
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
		//
	}

}
