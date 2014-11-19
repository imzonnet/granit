<?php namespace Components\Stones\Database\Seeds;
use Faker\Factory as Faker;
use Components\Stones\Models\IconCategory;
use DB;

class IconsTableSeeder extends \Seeder {
    
    public function run() {
        $faker = Faker::create();
        DB::table('granit_icons')->delete();
        $categories = array();
        foreach(IconCategory::all() as $category){
            $categories[] = $category->id;
        }
        $user = \User::first();
        foreach(range(1,15) as $index) {
            DB::table('granit_icons')->insert([
                'name' => $faker->name,
                'image' => $faker->imageUrl(170, 200),
                'customize' => rand(0,1),
                'cat_id' => $categories[array_rand($categories)],
                'status' => 'published',
                'ordering' => 0,
                'created_by' => $user->id,
            ]);
            
        }
    }   
    
}