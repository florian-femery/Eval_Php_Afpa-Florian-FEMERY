<?php 
namespace App;

class App{

    /**
     * @return [date]
     * Get date of today
     */
    public static function getDate(){
        return str_replace('-', '/',date("Y-m-d")); 
    }

    /**
     * @return [datetime]
     * Get precise date and time of today
     */
    public static function getDateTime(){
        return str_replace('-', '/',date("Y-m-d H:i:s")); 
    }

    /**
     * @return [string / filepath]
     * get updated filepath if $filepath is set in view
     */
    public static function getFilePath(){
        return isset($file_path) ? $file_path : '';
    }

}

