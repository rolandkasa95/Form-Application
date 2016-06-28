<?php

class UserModel implements ModelInteface
{

    protected $db;

    /**
     * UserModel constructor.
     * @param $pdo
     */
    public function __construct($pdo)
    {
        $this->db = $pdo;
    }

    public function getUsers(){
        $sql= 'Select * from `users`';
        try{
            return $this->db->query($sql,PDO::FETCH_ASSOC);
        }catch (PDOException $e){
            echo "Errore constucting the query: " . $e->getMessage();
        }
    }
}