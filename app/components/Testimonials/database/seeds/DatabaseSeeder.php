<?php namespace Components\Testimonials\Database\Seeder;

use Components\Testimonials\Database\Seeds\TestimonialTableSeeder;

class DatabaseSeeder extends \Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
            \Eloquent::unguard();
            $this->call('Components\Testimonials\Database\Seeds\TestimonialTableSeeder');
	}

}
