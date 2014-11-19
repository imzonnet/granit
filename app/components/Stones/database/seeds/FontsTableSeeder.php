<?php namespace Components\Stones\Database\Seeds;
use Faker\Factory as Faker;
use DB;

class FontsTableSeeder extends \Seeder {
    
    public function run() {
        $faker = Faker::create();
        DB::table('granit_fonts')->delete();
        $user = \User::first();
        $fonts = array(
            [ 'name' => 'Open Sans', 'url' => 'http://fonts.googleapis.com/css?family=Open+Sans'],
            ['name' => 'Kristi', 'url' => 'http://fonts.googleapis.com/css?family=Kristi'],
            ['name' => 'Kalam', 'url' => 'http://fonts.googleapis.com/css?family=Kalam'],
            [ 'name' => 'Bangers', 'url' => 'http://fonts.googleapis.com/css?family=Bangers']
        );
        foreach($fonts as $font) {
            DB::table('granit_fonts')->insert([
                'name' => $font['name'],
                'url' => $font['url'],
                'status' => 'published',
                'ordering' => 0,
                'created_by' => $user->id,
            ]);
            
        }
    }   
    
}