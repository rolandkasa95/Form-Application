<?php

namespace Validators;

class Duplication implements ValidatorInterface
{
    protected $db;
    protected $config;

    /**
     * Duplication constructor.
     *
     * Gets config file to connect to the database
     */
    public function __construct()
    {
        $this->config = \ObjectFactoryService::getConfig();
    }

    /**
     * This function checks if the user is in the database,
     * not to register that again!
     *
     * @param $value
     * @return bool
     */
    public function validate($value)
    {
        $this->db=\ObjectFactoryService::getDb($this->config);
        $sql = "SELECT username FROM users WHERE username='" . $value . "'";
        $statement = $this->db->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return empty($result);
    }
}