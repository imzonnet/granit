<?php namespace Components\Memorials\Database\Seeder;
use Faker\Factory as Faker;
use Components\Memorials\Models\Memorial;
use DB;

class MemorialsTableSeeder extends \Seeder {
    
    public function run() {
        $faker = Faker::create();
        DB::table('granit_memorials')->delete();
        $user = \User::first();
        foreach(range(1,20) as $index) {
            
            DB::table('granit_memorials')->insert([
                'name' => $faker->name,
                'avatar' => $faker->imageUrl(rand(350, 370), 400),
                'birthday' => $faker->dateTimeThisCentury(),
                'death' => $faker->dateTimeBetween('-3 months', '-1 months'),
                'biography' => $faker->text,
                'obituary' => $faker->text,
                'created_by' => $user->id,
                'created_at' => $faker->dateTime('now'),
                'updated_at' => $faker->dateTime('now'),
            ]);
        }
    }   
}