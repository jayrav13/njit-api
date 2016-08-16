<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use Log;

class SendJobCompletedEmail extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Log::info("MADE IT TO THE JOB");
        try
        {
            $message = Mail::send('schedules.test', ["foo" => "bar"], function($m) {
                $m->to('jayrav13@gmail.com', 'Jay Ravaliya');
                $m->from('jayrav13@gmail.com');
            });
        }
        catch (Exception $e)
        {
            Log::info($e->getMessage());
        }
    }
}
