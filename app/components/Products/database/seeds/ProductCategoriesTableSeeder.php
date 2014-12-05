<?php namespace Components\Products\Database\Seeds;
use Faker\Factory as Faker;
use DB;

class ProductCategoriesTableSeeder extends \Seeder {
    
    public function run() {
        $faker = Faker::create();
        DB::table('granit_product_categories')->delete();
        $cats = ['Small', 'Medium', 'Large'];
        $user = \User::first();
        foreach($cats as $cat) {
            $name = $cat;
            $alias = \Str::slug($name);
            DB::table('granit_product_categories')->insert([
                'name' => $name,
                'alias' => $alias,
                'image' => "assets/granit/u-{$name}.png",
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