<?php

namespace Modules\Hr\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\Hr\Entities\Application;

class GuestEmail extends Mailable
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
        return $this->markdown('hr::emails.guest')
            ->subject('İş Başvuru Formu : '.$this->application->id.' No.lu Başvuru')
            ->replyTo(setting('hr::email'), setting('theme::company-name'))
            ->with(['application'=>$this->application]);
    }
}
