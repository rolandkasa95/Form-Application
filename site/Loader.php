<?php


class Loader
{
    public static function init()
    {
        //Add file extensions for the autoloader
        spl_autoload_extensions('.php');

        //Set applications paths for the spl_autoloader
        foreach(ObjectFactoryService::getConfig()['autoloaderpaths'] as $path){
            set_include_path(get_include_path() . PATH_SEPARATOR . __DIR__ . DIRECTORY_SEPARATOR . $path . DIRECTORY_SEPARATOR);
//            var_dump(set_include_path(get_include_path() . PATH_SEPARATOR . __DIR__ . DIRECTORY_SEPARATOR . $path . DIRECTORY_SEPARATOR));
//            die;
        }

        //Register autoloader methods here, or leave the call empty for spl_autoloader default
        spl_autoload_register(function ($class) {

//            var_dump( $class );

            require $class . '.php';
        });
    }
    
}