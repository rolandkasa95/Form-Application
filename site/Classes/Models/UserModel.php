<?php

namespace Models;
/**
 * User Model Class
 */
class UserModel implements ModelInterface
{
    
    protected $db;

    /**
     * @param $pdo
     */
    public function __construct($pdo)
    {
        $this->db = $pdo;
    }

    /**
     * @return mixed
     */
    public function getUsers()
    {
        $sql = "SELECT * FROM users";
        try {
            return $this->db->query($sql, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            //Log error ...
            echo $e->getMessage();
        }
    }

    /**
     * @return mixed
     */
    public function authenticate($data)
    {
        $sql = "SELECT * FROM users WHERE username = '{$data['username']}'";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if($result && password_verify($data['password'], $result['password'])){
                return $result;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            //Log error ...
        }
    }

    /**
     * @param $data
     */
    public function saveUser($data)
    {
        //Encrypt the password
        $hash = password_hash($data['password'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO users(username, password, first_name, last_name, email, email_preferred_contact, country) VALUES (:username, :password, :first_name, :last_name, :email, :email_preferred_contact, :country)";

        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':username', $data['username'], PDO::PARAM_STR, 50);
            $stmt->bindParam(':password', $hash, PDO::PARAM_STR, 255);
            $stmt->bindParam(':first_name', $data['first_name'], PDO::PARAM_STR, 50);
            $stmt->bindParam(':last_name', $data['last_name'], PDO::PARAM_STR, 50);
            $stmt->bindParam(':email', $data['email'], PDO::PARAM_STR, 50);
            $stmt->bindParam(':email_preferred_contact', $data['email_preferred_contact'], PDO::PARAM_STR, 1);
            $stmt->bindParam(':country', $data['country'], PDO::PARAM_STR, 100);
            $stmt->execute();
        } catch (PDOException $e) {
            //Log error ...
            echo $e->getMessage();
        }
    }
}