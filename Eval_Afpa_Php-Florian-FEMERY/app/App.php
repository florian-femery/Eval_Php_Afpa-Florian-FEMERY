<?php 
namespace App;

class App{

    public static function getDate(){
        return str_replace('-', '/',date("Y-m-d")); 
    }

    public static function getDateTime(){
        return str_replace('-', '/',date("Y-m-d H:i:s")); 
    }

    public static function getFilePath(){
        return isset($file_path) ? $file_path : '';
    }

}

