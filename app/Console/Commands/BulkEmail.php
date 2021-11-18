<?php

namespace App\Console\Commands;

use App\Jobs\SendBulkEmailJob;
use Illuminate\Console\Command;

class BulkEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bulk_email:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send bulk email fou updates';

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
        ## For Task using emails array we can also store email in database and fetch from there.

        $emails = [
            'yogeshv302@gmail.com',
            'vishwakarma.yogesh33@gmail.com'
        ];

        foreach ($emails as $key => $email) {
            
            SendBulkEmailJob::dispatch($email);

            $this->info('Mail Send to '.$email);
        }
    }
}
