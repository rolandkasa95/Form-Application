<?php

class configController
{
    public $models;

    public static function getModels(){
        $config = require 'Config/config.php';
        $models = [
            'user' => ObjectFactoryService::getModel('UserModel', $config),
            'country' => ObjectFactoryService::getModel('CountryModel', $config)
        ];

        return $models;
    }

}