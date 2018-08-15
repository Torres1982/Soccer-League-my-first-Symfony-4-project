<?php
/**
 * Created by PhpStorm.
 * User: Torres
 * Date: 15/08/2018
 * Time: 23:27
 */

namespace App\Service;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploader
{
    private $fileDirectory;

    public function __construct($fileDirectory) {
        $this->fileDirectory = $fileDirectory;
    }

    public function getFileDirectory() {
        return $this->fileDirectory;
    }

    /**
     * Handles upload of the Files
     * @param UploadedFile $file
     * @return string
     */
    public function uploadFile(UploadedFile $file) {
        $fileName = md5(uniqid()).'.'.$file->guessExtension();
        $file->move($this->getFileDirectory(), $fileName);

        return $fileName;
    }
}