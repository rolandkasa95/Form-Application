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

    /**
     * @return mixed
     */
    public function getUsers(){
        $sql= 'Select * from `users`';
        try{
            return $this->db->query($sql,PDO::FETCH_ASSOC);
        }catch (PDOException $e){
            echo "Errore constucting the query: " . $e->getMessage();
        }
    }

    /**
     * @param $data
     * @return bool
     */
    public function authenticate($data){
        $sql = "select * from users where username='{$data['username']}'";
        try {
            $statement = $this->db->query($sql);
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            if ($result && passowrd_verify($data['password'], $result['password'])) {
                return $result;
            }else{
                return false;
            }
        }catch(PDOException $e){
            echo "Error atenticating the user: " . $e->getMessage();
        }
    }
}