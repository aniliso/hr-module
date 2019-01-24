<?php namespace Modules\Hr\Services;

use Modules\Hr\Entities\Application;
use Barryvdh\DomPDF\PDF;

class PdfCreator
{
    private $folder;
    private $file;
    /**
     * @var Application
     */
    private $application;

    public function __construct()
    {
        $this->pdf = app(PDF::class);
        $this->setFolder(storage_path(config('asgard.hr.config.pdf_folder')));
        $this->createDirectories();
    }

    public function create()
    {
        $pdf = $this->pdf->loadView('hr::pdf.application', ['application'=>$this->application]);
        $pdf->save($this->getFilePath());
        $this->setFile($this->getFilePath());
        return $this->getFilePath();
    }

    public function getFilePath()
    {
        return $this->getFolder() . '/' . $this->getFile();
    }

    /**
     * @param string $folder
     * @return $this
     */
    public function setFolder(string $folder)
    {
        $this->folder = $folder;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFolder()
    {
        return $this->folder;
    }

    /**
     * @param mixed $file
     */
    public function setFile($file)
    {
        $this->file = $file;
    }

    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param Application $application
     */
    public function setApplication(Application $application)
    {
        $this->application = $application;
        $this->setFile("{$application->id}_{$application->first_name}_{$application->last_name}.pdf");
        return $this;
    }

    protected function createDirectories()
    {
        if( ! \File::isDirectory(storage_path('app/modules'))) {
            \File::makeDirectory(storage_path('app/modules'));
        }

        if( ! \File::isDirectory($this->getFolder())) {
            \File::makeDirectory($this->getFolder());
        }
        return $this;
    }

    /**
     * @return Application
     */
    public function getApplication(): Application
    {
        return $this->application;
    }
}
