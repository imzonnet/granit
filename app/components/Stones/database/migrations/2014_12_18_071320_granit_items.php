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
                $table->string('title');
                $table->integer('product_color_id')->unsigned();
                $table->foreign('product_color_id')->references('id')->on('granit_product_colors');
                $table->integer('color_id')->unsigned();
                $table->foreign('color_id')->references('id')->on('granit_colors');
                $table->integer('font_id')->unsigned();
                $table->foreign('font_id')->references('id')->on('granit_fonts');
                $table->string('first_text');
                $table->tinyInteger('first_text_show');
                $table->string('first_text_coordinate');
                $table->string('memorial_word');
                $table->tinyInteger('memorial_word_show');
                $table->string('memorial_word_coodinate');
                $table->string('poem');
                $table->string('poem_coordinate');
                $table->tinyInteger('painted_text');
                $table->tinyInteger('permanent_text');
                $table->string('status');
                $table->integer('created_by')->unsigned();
                $table->foreign('created_by')->references('id')->on('users');
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