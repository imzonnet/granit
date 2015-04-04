<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GranitIcons extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('granit_icons', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('image');
            $table->string('filter_image');
            $table->tinyInteger('customize');
            $table->decimal('price',10,2);
            $table->string('type')->default('default');
            $table->integer('cat_id')->unsigned();
            $table->foreign('cat_id')->references('id')->on('granit_icon_categories')->onDelete('cascade')->onUpdate('cascade');
            $table->string('status');
            $table->integer('ordering')->default(0);
            $table->integer('created_by')->unsigned();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('granit_icons');
    }

}
