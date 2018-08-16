<?php
/**
 * Created by PhpStorm.
 * User: Torres
 * Date: 15/08/2018
 * Time: 23:27
 */

namespace App\Service;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;

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
     * Handles upload of the Files (excel files uploaded by Admin only)
     * @param UploadedFile $file
     * @return string
     */
    public function uploadFile(UploadedFile $file) {
        $fileSystem = new Filesystem();
        //$fileName = md5(uniqid()) . '.' . $file->guessExtension();
        $fileName = $file->getClientOriginalName();

        if ($fileSystem->exists($this->getFileDirectory())) {
            try {
                $file->move($this->getFileDirectory(), $fileName);
            } catch (IOExceptionInterface $exception) {
                echo 'Error occurred while loading the File!';
            }
        }

        return $fileName;
    }
}