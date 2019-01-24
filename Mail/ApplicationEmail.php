<?php

namespace Modules\Hr\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Modules\Hr\Entities\Application;
use Modules\Hr\Services\PdfCreator;

class ApplicationEmail extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * @var Application
     */
    private $application;
    private $file;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Application $application)
    {
        $this->application = $application;
        $this->file = (new PdfCreator())->setApplication($application)->getFilePath();
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

        if(file_exists($this->file)) {
            $this->attach($this->file);
        }

        return $this->markdown('hr::emails.application')
                    ->subject('İş Başvuru Formu : '.$this->application->id.' No.lu Başvuru')
                    ->replyTo($this->application->present()->contact('email'), $this->application->present()->fullname)
                    ->with(['application'=>$this->application]);
    }
}
