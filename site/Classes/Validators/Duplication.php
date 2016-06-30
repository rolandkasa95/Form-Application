<?php

class Duplication implements ValidatorInterface
{
    protected $db;
    
    public function validate($value)
    {
        $this->db=ObjectFactoryService::getDb(ObjectFactoryService::getConfig());
        $sql = "SELECT username FROM users WHERE username='" . $value . "'";
        $statement = $this->db->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return empty($result);
    }
}