<?php namespace Components\Memorials\Database\Seeder;
use Faker\Factory as Faker;
use Components\Memorials\Models\Memorial;
use DB;

class MemorialGuestbooksTableSeeder extends \Seeder {
    
    public function run() {
        $faker = Faker::create();
        DB::table('granit_memorial_guestbooks')->delete();
        $user = \User::first();
        
        $memorials = array();
        foreach(Memorial::all() as $memorial) {
            $memorials[] = $memorial->id;
        }
        foreach(range(1,20) as $index) {
            DB::table('granit_memorial_guestbooks')->insert([
                'title' => $faker->name,
                'content' => $faker->paragraph(),
                'memorial_id' => $memorials[array_rand($memorials)],
                'created_by' => $user->id,
                'created_at' => $faker->dateTime('now'),
                'updated_at' => $faker->dateTime('now'),
            ]);
        }
    }   
}