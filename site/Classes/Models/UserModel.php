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

    /**
     * @param $data
     */
    public function saveUser($data){
        $hash = password_hash($data['password'],PASSWORD_DEFAULT);
        $sql = "INSERT INTO `users` (`username`,`passowrd`,`first_name`,`last_name`,`email`,`email_preferred_contact`,`country`) VALUES (:username, :password, :first_name, :last_name, :email, :email_preferred_contact, :country)";

        try{
            $statemet = $this->db->prepare($sql);
            $statemet->bindParam(':username',$data['username'],PDO::PARAM_STR,50);
            $statemet->bindParam(':password',$hash,PDO::PARAM_STR,255);
            $statemet->bindParam(':last_name',$data['last_name'],PDO::PARAM_STR,50);
            $statemet->bindParam(':first_name',$data['first_name'],PDO::PARAM_STR,50);
            $statemet->bindParam(':email',$data['email'],PDO::PARAM_STR,50);
            $statemet->bindParam(':email_preferred_contact',$data['email_preferred_contact'],PDO::PARAM_STR,1);
            $statemet->bindParam(':country',$data['country'],PDO::PARAM_STR,100);
            $statemet->execute();
        }catch(PDOException $e){
            echo 'Error ocurring registering: ' . $e->getMessage();
        }
    }
}