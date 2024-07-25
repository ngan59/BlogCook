<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ShowConfig extends Command
{
    protected $signature = 'config:show';
    protected $description = 'Show the current configuration settings';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->info('App Name: ' . config('app.name'));
        $this->info('Database Connection: ' . config('database.default'));
        $this->info('Mail Driver: ' . config('mail.driver'));
    }
}
