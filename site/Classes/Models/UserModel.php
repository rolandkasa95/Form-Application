<?php

class UserModel implements ModelInteface
{

    protected $db;

    public function __construct($pdo)
    {
        $this->db = $pdo;
    }
}