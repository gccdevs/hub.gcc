<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RunCheckTokenScheduler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'schedule:check-token';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start checking on if the invitation token expired at given time frame';

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
    public function handle()
    {
        $this->call('while true; do php artisan schedule:run; sleep 60; done');

    }
}
