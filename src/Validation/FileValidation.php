<?php

namespace src\Validation;

use src\Validation\Util\ValidationUtil;
use Model\EventType;
use src\Queries\{EventTypeQueries, EventQueries};

final class FileValidation extends ValidationUtil
{
    protected string $uniqueFile;
    protected string $fileTmpName;
    protected array $formErrorsFile = [];
    public function validateFile(array $file): array
    {
        $tmpName = $file['tmp_name'];
        $name = $file['name'];
        $size = $file['size'];
        $error = $file['error'];

        $tabExtension = explode('.', $name);
        $extension = strtolower(end($tabExtension));
        $extensions = ['jpg', 'png', 'jpeg', 'gif', 'webp'];
        $maxSize = 2000000;
       
            if (in_array($extension, $extensions) && $error !== 8) {
               
                if ($size <= $maxSize && $error !== 1) {
                    $uniqueName = uniqid('', true);
                    $this->uniqueFile = $uniqueName . "." . $extension;
                    $this->fileTmpName = $tmpName;
                } else {
                    $this->formErrorsFile['size'] = ValidationUtil::IMAGE_ERROR_INVALID_SIZE;
                }
            } else {
                $this->formErrorsFile['extention'] = ValidationUtil::IMAGE_ERROR_INVALID_EXTENTION;
            }
            if (count($this->formErrorsFile) == 0) {
                return $this->formErrorsFile = [];
            } else {
                return $this->formErrorsFile;
            } 
        }    

        public function getUniqueFile(): string
        {
            return $this->uniqueFile;
        }
        public function getFileTmpName(): string
        {
            return $this->fileTmpName;
        }


}