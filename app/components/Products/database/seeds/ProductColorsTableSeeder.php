<?php

namespace Components\Products\Database\Seeds;

use Faker\Factory as Faker;
use Components\Products\Models\Product;
use Components\Products\Models\Color;
use DB;

class ProductColorsTableSeeder extends \Seeder {

    public function run() {
        $faker = Faker::create();

        DB::table('granit_product_colors')->delete();
        DB::table('granit_product_color_map')->delete();
        $user = \User::first();
        
        $colors = ['Aurora', 'China Grey', 'M.C. Green', 'M.C. Red', 'Olive Green', 'Paradiso', 'Pearl White', 'Shanxi Black', 'Vizag Blue'];
        foreach ($colors as $color) {
            DB::table('granit_product_colors')->insert([
                'name' => $color,
                'icon' => "assets/granit/color-" . rand(1, 4) . ".jpg"
            ]);
        }
        $colors = array();
        foreach (Color::all() as $color) {
            $colors[] = $color->id;
        }
        $products = array();
        foreach (Product::all() as $product) {
            $products[] = $product->id;
        }
        foreach ($products as $product_id) {
            foreach (range(1, rand(2, 4)) as $number) {
                DB::table('granit_product_color_map')->insert([
                    'name' => $faker->colorName,
                    'product_id' => $product_id,
                    'color_id' => $colors[array_rand($colors)],
                    'thumbnail' => "assets/granit/color-{$number}.jpg",
                    'image' => "assets/granit/{$number}-SB.jpg",
                    'price' => $faker->randomNumber(2),
                    'sale' => 0,
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
