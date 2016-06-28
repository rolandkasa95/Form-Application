<?php

abstract class ObjectFactoryService{
    public static $pdo;
    public static $session;
    public static $config;
    public static $model = [];


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

    public static function getConfig(){
        if (!self::$config){
            self::$config = require 'Config/config.php';
        }
        return self::$config;
    }
}