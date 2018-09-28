<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;

class FileService
{
    public function store(UploadedFile $file)
    {
        $adapter = new Local(base_path() . '/public/uploads');
        $filesystem = new Filesystem($adapter);
        $filesystem->write($file->getClientOriginalName(), file_get_contents($file->getPathname()));
    }
}
