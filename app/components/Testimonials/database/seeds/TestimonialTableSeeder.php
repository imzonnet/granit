<?php

namespace Components\Testimonials\Database\Seeds;

use Faker\Factory as Faker;
use DB;

class TestimonialTableSeeder extends \Seeder {

    public function run() {
        $faker = Faker::create();
        DB::table('granit_testimonials')->delete();
        foreach (range(1, 5) as $number) {
            $name = $faker->name;
            DB::table('granit_testimonials')->insert([
                'name' => $faker->name,
                'title' => $faker->sentence(4),
                'description' => $faker->text,
                'rate' => $faker->numberBetween(1, 5),
                'ordering' => 0,
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ]);
        }
    }

}
