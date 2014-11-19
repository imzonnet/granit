<?php namespace Components\Stones\Database\Seeds;
use Faker\Factory as Faker;
use DB;

class ColorsTableSeeder extends \Seeder {
    
    public function run() {
        $faker = Faker::create();
        DB::table('granit_colors')->delete();
        $user = \User::first();
        foreach(range(1,5) as $index) {
            DB::table('granit_colors')->insert([
                'name' => $faker->colorName,
                'hexcode' => $faker->hexcolor,
                'status' => 'published',
                'ordering' => 0,
                'created_by' => $user->id,
            ]);
            
        }
    }   
    
}