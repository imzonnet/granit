<?php

namespace Components\Stones\Database\Seeds;

use Faker\Factory as Faker;
use DB;

class IconCategoriesTableSeeder extends \Seeder {

    public function run() {
        $faker = Faker::create();
        DB::table('granit_icon_categories')->delete();
        $user = \User::first();
        $data = ['Light & Vases', 'Crosses', 'Decorations', 'Birds', 'Statues', 'Ceramic Photo', 'Engraved Photos', 'Other'];
        $i = 1;
        foreach ($data as $index => $name) {
            DB::table('granit_icon_categories')->insert([
                'name' => $name,
                'alias' => \Str::slug($name),
                'image' => 'assets/granit/icons/'. $i++.'.png',
                'description' => $faker->text,
                'status' => 'published',
                'ordering' => 0,
                'created_by' => $user->id,
            ]);
        }
    }

}
