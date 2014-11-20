<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class ProjectSetup extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'project:setup';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create the migration repository.';

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
        $this->info('Project Setup');
        $this->info('_____________________________________________');
        $this->call('migrate');
        $this->call('migrate', array('--path' => 'app/components/posts/database/migrations/'));
        $this->call('migrate', array('--path' => 'app/modules/Slideshow/Database/migrations/'));
        $this->call('migrate', array('--path' => 'app/components/media_manager/database/migrations/'));
        $this->call('migrate', array('--path' => 'app/components/theme_manager/database/migrations/'));
        $this->call('migrate', array('--path' => 'app/components/ContactManager/Database/Migrations/'));

        $this->call('migrate', array('--path' => 'app/components/ReportBuilder/Database/Migrations/'));
        $this->call('migrate', array('--path' => 'app/components/ReportGenerator/Database/Migrations/'));

        $this->call('migrate', array('--path' => 'app/components/Products/database/migrations'));
        $this->call('migrate', array('--path' => 'app/components/Stones/database/migrations'));
        $this->call('migrate', array('--path' => 'app/components/Memorials/database/migrations'));
        $this->info('____________Completed_____________');

    }

}
