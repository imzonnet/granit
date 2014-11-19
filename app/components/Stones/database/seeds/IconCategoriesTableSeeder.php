<?php namespace Components\Stones\Database\Seeds;
use Faker\Factory as Faker;
use DB;

class IconCategoriesTableSeeder extends \Seeder {
    
    public function run() {
        $faker = Faker::create();
        DB::table('granit_icon_categories')->delete();
        $user = \User::first();
        foreach(range(1,5) as $index) {
            DB::table('granit_icon_categories')->insert([
                'name' => $faker->name,
                'image' => $faker->imageUrl(rand(170,180), 210),
                'description' => $faker->text,
                'status' => 'published',
                'ordering' => 0,
                'created_by' => $user->id,
            ]);
            
        }
    }   
    
}