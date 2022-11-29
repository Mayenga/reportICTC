<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\SendReportJob;

class SendReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send_weekly_report';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Users will be sending their reports to DG and Directors';

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
        SendReportJob::dispatch();
    }
}
