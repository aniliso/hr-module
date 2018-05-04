<?php

namespace Modules\Hr\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\Hr\Entities\Application;

class ApplicationCreated extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * @var Application
     */
    private $application;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Application $application)
    {
        $this->application = $application;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if(isset($this->application->attachment()->first()->path)) {
            $this->attach(public_path($this->application->attachment()->first()->path));
        }

        return $this->view('hr::emails.application')
                    ->subject('İş Başvuru Formu : '.$this->application->id.' No.lu Başvuru')
                    ->replyTo($this->application->present()->contact('email'), $this->application->present()->fullname)
                    ->with(['application'=>$this->application]);
    }
}
