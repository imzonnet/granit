<?php namespace Components\Products\Database\Seeds;
use Faker\Factory as Faker;
use Components\Products\Models\Category;
use DB;
class ProductsTableSeeder extends \Seeder {
    
    public function run() {
        $faker = Faker::create();
        DB::table('granit_products')->delete();
        $user = \User::first();
        $categories = array();
        foreach(Category::all() as $category) {
            $categories[] = $category->id;
        }
        
        foreach($categories as $cat_id) {
            foreach(range(1, 3) as $number){
                $name = $faker->name;
                $alias = \Str::slug($name);
                DB::table('granit_products')->insert([
                    'product_code' => $faker->ean8,
                    'name' => $name,
                    'alias' => $alias,
                    'thumbnail' => "assets/granit/{$number}-SB.jpg",
                    'description' => $faker->text,
                    'cat_id' => $cat_id,
                    'status' => 'published',
                    'ordering' => 0,
                    'created_by' => $user->id,
                    'created_at' => date('Y-m-d'),
                    'updated_at' => date('Y-m-d')
                ]);
            }
        }
    }   
    
}