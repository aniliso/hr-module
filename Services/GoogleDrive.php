<?php namespace Modules\Hr\Services;

use Storage;

class GoogleDrive
{
    private $folder;
    private $recursive = false;
    private $file;
    private $storage;

    public function __construct()
    {
        $this->storage = Storage::drive('google');
    }

    public function folderList($dir='/')
    {
        $contents = collect($this->storage->listContents($dir, $this->recursive));
        return $contents;
    }

    public function getFile()
    {
        $files = $this->folderList();
        return $files->where('filename', '=', pathinfo($this->folder.'/'.$this->file, PATHINFO_FILENAME))->first();
    }

    public function upload($contents)
    {
        $file_path = $this->getFile()['path'];
        if($this->storage->has($file_path)) {
            return $this->storage->update($file_path, $contents);
        } else {
            return $this->storage->put($this->file, $contents);
        }
    }

    public function delete()
    {
        $file = $this->getFile();
        return $this->storage->delete($file['path']);
    }

    /**
     * @param $file
     * @return $this
     */
    public function setFile($file)
    {
        $this->file = $file;
        return $this;
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
}