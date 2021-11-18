<?php

namespace App\Jobs;

use App\Mail\SendBulkEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;

class SendBulkEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    protected $email_add;

    public function __construct($email_add)
    {
        $this->email_add = $email_add;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email_data = new SendBulkEmail();
        
        Mail::to($this->email_add)->send($email_data);
    }
}
