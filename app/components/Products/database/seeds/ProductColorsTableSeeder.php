<?php namespace Components\Products\Database\Seeds;
use Faker\Factory as Faker;
use Components\Products\Models\Product;
use DB;
class ProductColorsTableSeeder extends \Seeder {
    
    public function run() {
        $faker = Faker::create();
        DB::table('granit_product_colors')->delete();
        $user = \User::first();
        $products = array();
        foreach(Product::all() as $product) {
            $products[] = $product->id;
        }
        
        foreach($products as $product_id) {
            foreach(range(1, 3) as $number){
                $name = $faker->name;
                $alias = \Str::slug($name);
                DB::table('granit_product_colors')->insert([
                    'name' => $name,
                    'product_id' => $product_id,
                    'thumbnail' => "assets/granit/color-{$number}.jpg",
                    'image' => "assets/granit/{$number}-SB.jpg",
                    'price' => $faker->randomNumber(2),
                    'characteristic_price' => $faker->randomNumber(2),
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