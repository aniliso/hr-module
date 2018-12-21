<?php

namespace Modules\Hr\Jobs;

use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Bus\Queueable;
use Modules\Hr\Entities\Application;
use Modules\Hr\Mail\ApplicationEmail;
use Modules\Hr\Mail\SendApplicationEmail;

class SendApplicationNotified implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, SerializesModels, Queueable;
    /**
     * @var Application
     */
    private $application;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Application $application)
    {
        $this->application = $application;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        \Mail::to(setting('hr::email'))->queue((new ApplicationEmail($this->application))->delay(30));
    }
}
