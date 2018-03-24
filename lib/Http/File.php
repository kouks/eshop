<?php

namespace Lib\Http;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class File
{
    /**
     * The file to be stored.
     *
     * @var \Symfony\Component\HttpFoundation\File\UploadedFile
     */
    protected $file;

    /**
     * Class constructor.
     *
     * @param  \Symfony\Component\HttpFoundation\File\UploadedFile  $file
     * @return void
     */
    public function __construct(UploadedFile $file)
    {
        $this->file = $file;
    }

    /**
     * Stores the uploaded file and returns its new name.
     *
     * @param  string  $path
     * @param  string  $name
     * @return string
     */
    public function store($path = 'uploads', $name = null)
    {
        $path = trim($path, '/').'/';
        $fullPath = base_path('public/'.$path);
        $name = $name ?: md5(time()).'.'.$this->file->guessClientExtension();

        $this->file->move($fullPath, $name);

        return '/'.$path.$name;
    }
}
