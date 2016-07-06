<?php


/**
 * Abstract objects factory class
 */
abstract class ObjectFactoryService
{
    /**
     * Database object
     * @var object
     */
    public static $pdo;
    /**
     * Session object
     * @var object
     */
    public static $session;
    /**
     *  Config array
     * @var array
     */
    public static $config;
    /**
     * Models array
     * @var array
     */
    public static $models = [];

    
    
    /**
     * @param array|null $connectParams
     * @return object $pdo The PDO object
     */
    public static function getDb(array $connectParams = null)
    {
        if (!self::$pdo) {
            try {
                $config = [PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION];
                self::$pdo = new \PDO($connectParams['db']['dsn'],
                    $connectParams['db']['user'],
                    $connectParams['db']['pass'],
                    $config);
            } catch (PDOException $e) {
                echo 'Failed connection' . $e->getMessage();
            }
        }
        return self::$pdo;
    }

    /**
     *Retrieve the system configuration
     */
    public static function getConfig()
    {
        if (!self::$config) {
            self::$config = require 'Config/config.php';
        }
        return self::$config;
    }

    /**
     * @return Session
     */

    public static function getConfigLoader(){
        return require 'Config/configLoader.php';
    }

    /**
     * Getter for Session
     *
     * @return Session
     */
    public static function getSession()
    {
        if (!self::$session) {
            self::$session = new Session();
        }
        return self::$session;
    }

    /**
     * Provides model class abstraction
     * @param $model
     * @return object $model The model object
     * @param array $config
     */
    public static function getModel($model, $config)
    {
        if (!isset(self::$models[$model])){
            if($model === 'UserModel') {
                self::$models[$model] = new Models\UserModel(self::getDb($config));
            }else{
                self::$models[$model] = new Models\CountryModel(self::getDb($config));
            }
        };
        return self::$models[$model];
    }

    /**
     * Provides form class abstraction
     * @param $form
     * @param $model
     * @return object $form The form object
     */
    public static function getForm($form, $model)
    {
        if (!$form && !$model) return false;
        if ($form === 'LoginForm'){
            return new Forms\LoginForm($model);
        }elseif ($form === 'RegisterForm' ){
            return new Forms\RegisterForm($model);
        }
        }
}