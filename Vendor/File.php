<?php

class File
{

    public static function upload($file, $path = 'uploads/'){
        $fileName = uniqid().'-'.File::getFileName($file);
        $target_file = $path . $fileName;
        if(move_uploaded_file($file["tmp_name"],$target_file)){
            return $fileName;
        }

        return false;

    }

    public static function getFileName($file){
        $fileName = basename($file["name"]);
        return $fileName;
    }

    public static function getFileExtension($file){

        $fileName = basename($file["name"]);
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        return $fileExtension;
    }

    public static function validate($fileExtension,$allowed_extensions){
        if (!in_array($fileExtension,$allowed_extensions)) {
            return false;
        }

        return true;

    }
}






