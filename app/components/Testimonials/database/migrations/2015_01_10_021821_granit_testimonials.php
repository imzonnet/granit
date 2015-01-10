<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GranitTestimonials extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('granit_testimonials', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('name');
            $table->text('description');
            $table->integer('rate')->default(5);
            $table->integer('ordering')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('granit_testimonials');
    }

}
