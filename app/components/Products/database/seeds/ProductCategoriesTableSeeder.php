<?php namespace Components\Products\Database\Seeds;
use Faker\Factory as Faker;
use DB;

class ProductCategoriesTableSeeder extends \Seeder {
    
    public function run() {
        $faker = Faker::create();
        DB::table('granit_product_categories')->delete();
        $user = \User::first();
        foreach(range(1,5) as $index) {
            $name = $faker->name;
            $alias = \Str::title($name);
            DB::table('granit_product_categories')->insert([
                'name' => $name,
                'alias' => $alias,
                'image' => $faker->imageUrl(250,300),
                'description' => $faker->text,
                'status' => 'published',
                'ordering' => 0,
                'created_by' => $user->id,
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ]);
            
        }
    }   
    
}