<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class ProjectReset extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'project:reset';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Rollback all database migrations.';

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
        $this->info('_____Project uninstall______');
        $this->info('____________________________');
        $this->call('migrate:reset');
        $this->info('_________Completed__________');
    }



}
