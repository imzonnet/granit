<?php namespace Components\Memorials\Database\Seeder;

use Components\Memorials\Database\Seeder\MemorialsTableSeeder;
use Components\Memorials\Database\Seeder\MemorialGuestbooksTableSeeder;
use Components\Memorials\Database\Seeder\MemorialMediaTableSeeder;

class DatabaseSeeder extends \Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
            \Eloquent::unguard();
            $this->call('Components\Memorials\Database\Seeder\MemorialsTableSeeder');
            $this->call('Components\Memorials\Database\Seeder\MemorialGuestbooksTableSeeder');
            $this->call('Components\Memorials\Database\Seeder\MemorialMediaTableSeeder');
	}

}
