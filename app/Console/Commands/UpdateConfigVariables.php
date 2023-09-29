<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UpdateConfigVariables extends Command
{
    protected $signature = 'config:update';
    protected $description = 'Update configuration variables in config/app.php';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $configPath = config_path('app.php');
        $config = require $configPath;

        // Modify the configuration as needed
        $config['locale'] = config_app_locale();
        $config['fallback_locale'] = config_app_locale();

        // Write the updated configuration back to the file
        file_put_contents($configPath, '<?php return ' . var_export($config, true) . ';');

        $this->info('Configuration variables updated successfully.');
    }
}
