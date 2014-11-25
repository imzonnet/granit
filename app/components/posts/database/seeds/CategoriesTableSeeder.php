<?php
use Faker\Factory as Faker;
class CategoriesTableSeeder extends \Seeder {

    public function run() {
        // Uncomment the below to wipe the table clean before populating
        $faker = Faker::create();
        DB::table('categories')->delete();
        $user_id = User::first()->id;
        foreach(range(0,5) as $index) {
            $name = $faker->name;
            $slug = \Str::slug($name);
            DB::table('categories')->insert(array(
                'name' => $name,
                'alias' => $slug,
                'type' => 'post',
                'description' => $faker->paragraph,
                'status' => 'published',
                'created_by' => $user_id,
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ));
        }
    }

}
