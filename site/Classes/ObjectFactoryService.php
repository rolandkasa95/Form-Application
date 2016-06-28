<?php

abstract class ObjectFactoryService{
    public static $pdo;
    public static $session;
    public static $config;
    public static $models = [];


    /**
     * PDO connection
     *
     * Connecting to the database using the PDO method
     *
     * @param array|null $connectParams
     * @return PDO
     */
    public static function getDb(array $connectParams = null){
        if(!self::$pdo) {
            try{
                $config = [PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION];
                self::$pdo = new PDO($connectParams['db']['dsn'],
                    $connectParams['db']['user'],
                    $connectParams['db']['pass'],
                    $config);
            }catch(PDOException $e){
                echo "Error while connecting: " . $e->getMessage();
            }
        }
        return self::$pdo;
    }

    /**
     * @return mixed
     */
    public static function getConfig(){
        if (!self::$config){
            self::$config = require 'Config/config.php';
        }
        return self::$config;
    }

    /**
     * @param $model
     * @param $config
     * @return mixed
     */
    public static function getModel($model,$config){
        if (!isset(self::$models[$model])){
            self::$models[$model] = new $model(self::getDb($config));
        };
        return self::$models[$model];
    }

    /**
     * @return Session
     */
    public static function getSession(){
        if (!self::$session){
            self::$session = new Session();
        }
        return self::$session;
    }

    /**
     * @param $form
     * @param $model
     * @return bool
     */
    public static function getForm($form,$model){
        if(!$form && $model) return false;
        return new $form($model);
    }
}