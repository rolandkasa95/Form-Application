<?php

class CountryModel implements ModelInteface
{
    protected $db;

    /**
     * CountryModel constructor.
     * @param $pdo
     */
    public function __construct($pdo)
    {
        $this->db=$pdo;
    }
    
    public function getCountries(){
        $sql = 'SELECT `name` FROM country';
        try{
            $statement = $this->db->query($sql);
            $result = $statement->fetchAll(PDO::FETCH_COLUMN);
            sort($result);
            return $result;
        } catch (PDOException $e){
            echo "Failed constructing the querry: " . $e->getMessage();
        }
    }
}