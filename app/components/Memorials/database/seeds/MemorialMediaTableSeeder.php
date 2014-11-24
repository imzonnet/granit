<?php namespace Components\Memorials\Database\Seeder;
use Faker\Factory as Faker;
use Components\Memorials\Models\Memorial;
use DB;

class MemorialMediaTableSeeder extends \Seeder {
    
    public function run() {
        $faker = Faker::create();
        DB::table('granit_memorial_media')->delete();
        $user = \User::first();
        
        $memorials = array();
        foreach(Memorial::all() as $memorial) {
            $memorials[] = $memorial->id;
        }
        foreach(range(1,20) as $index) {
            DB::table('granit_memorial_media')->insert([
                'title' => $faker->name,
                'media_type' => 'image',
                'image' => $faker->imageUrl(rand(350, 450), rand(250, 300)),
                'url' => $faker->imageUrl(rand(650, 750), rand(650, 700)),
                'memorial_id' => $memorials[array_rand($memorials)],
                'created_by' => $user->id,
                'created_at' => $faker->dateTime('now'),
                'updated_at' => $faker->dateTime('now'),
            ]);
        }
    }   
}