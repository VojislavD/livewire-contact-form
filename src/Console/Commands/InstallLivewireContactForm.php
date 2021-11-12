<?php

namespace VojislavD\LivewireContactForm\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallLivewireContactForm extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'livewirecontactform:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the LivewireContactForm package';

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
     * @return int
     */
    public function handle()
    {
        $this->info('Installing LivewireContactForm package...');

        $this->info('Publishing configuration...');

        if (! $this->configExists('livewireContactForm.php')) {
            $this->publishConfiguration();
            $this->info('Published configuration.');
        } else {
            if ($this->shouldOverwriteConfig()) {
                $this->info('Overwriting configuration file...');
                $this->publishConfiguration($force = true);
            } else {
                $this->info('Existing configuration was not overwritten.');
            }
        }

        $this->info('LivewireContactForm package installed.');
    }

    private function configExists($fileName)
    {
        return File::exists(config_path($fileName));
    }

    private function shouldOverwriteConfig()
    {
        return $this->confirm(
            'Config file already exists. Do you want to overwrite it?',
            false
        );
    }

    private function publishConfiguration($forcePublish = false)
    {
        $params = [
            '--provider' => "VojislavD\LivewireContactForm\LivewireContactFormServiceProvider",
            '--tag' => "config"
        ];

        if ($forcePublish === true) {
            $params['--force'] = true;
        }

        $this->call('vendor:publish', $params);
    }
}