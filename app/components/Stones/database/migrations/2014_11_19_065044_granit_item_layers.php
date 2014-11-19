<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GranitItemLayers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('granit_item_layers', function(Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->integer('item_id')->unsigned();
                $table->foreign('item_id')->references('id')->on('granit_items');
                $table->enum('layer_type', array('icon', 'text'))->default('icon');
                $table->integer('icon_id')->unsigned()->default(0);
                $table->integer('color_id')->unsigned()->default(0);
                $table->integer('font_id')->unsigned()->default(0);
                $table->integer('font_size')->unsigned()->default(14);
                $table->integer('zoom')->default(0);
                $table->string('position');
                $table->integer('ordering')->default(0);
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
            Schema::drop('granit_item_layers');
	}

}
