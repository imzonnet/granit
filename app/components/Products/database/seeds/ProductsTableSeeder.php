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
        
        foreach(range(1,15) as $index) {
            
            $name = $faker->name;
            $alias = \Str::slug($name);
            DB::table('granit_products')->insert([
                'product_code' => $faker->ean8,
                'name' => $name,
                'alias' => $alias,
                'thumbnail' => $faker->imageUrl(rand(200, 220), 200),
                'image' => $faker->imageUrl(rand(450, 500), 400),
                'description' => $faker->text,
                'price' => $faker->numberBetween(50, 100),
                'cat_id' => $categories[array_rand($categories)],
                'status' => 'published',
                'ordering' => 0,
                'created_by' => $user->id,
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ]);
            
        }
    }   
    
}