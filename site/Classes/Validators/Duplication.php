<?php

namespace Validators;

class Duplication implements ValidatorInterface
{
    protected $db;
    protected $config;

    public function __construct()
    {
        $this->config = ObjectFactoryService::getConfig();
    }

    public function validate($value)
    {
        $this->db=ObjectFactoryService::getDb($this->config);
        $sql = "SELECT username FROM users WHERE username='" . $value . "'";
        $statement = $this->db->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return empty($result);
    }
}