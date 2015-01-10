<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class ProjectSeed extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'project:seed';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Seed the database with records.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		
        $this->info('Install Sample Data');
        $this->info('______________________________________________');
        $this->call('db:seed');
        $this->call('db:seed', ['--class' => 'Components\Products\Database\Seeder\DatabaseSeeder']);
        $this->call('db:seed', ['--class' => 'Components\Stones\Database\Seeder\DatabaseSeeder']);
        $this->call('db:seed', ['--class' => 'Components\Memorials\Database\Seeder\DatabaseSeeder']);
        $this->call('db:seed', ['--class' => 'Components\Testimonials\Database\Seeder\DatabaseSeeder']);
        $this->info('____________Completed_____________');
        $this->info('Finish: Admin account: admin/admin123');
	}
}
