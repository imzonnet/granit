<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GranitItemNames extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('granit_item_names', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('item_id')->unsigned();
            $table->foreign('item_id')->references('id')->on('granit_items');
            $table->string('name');
            $table->string('name_coordinate');
            $table->string('sub_title');
            $table->string('sub_coordinate');
            $table->string('birthday');
            $table->string('death');
            $table->string('date_coodinate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('granit_item_names');
    }

}
