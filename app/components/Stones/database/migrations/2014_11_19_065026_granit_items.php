<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GranitItems extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('granit_items', function(Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->integer('product_id')->unsigned();
                $table->foreign('product_id')->references('id')->on('granit_products');
                $table->integer('created_by')->unsinged()->default(0);
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
            Schema::drop('granit_items');
	}

}
