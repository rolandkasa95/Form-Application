<?php

class CountryModel implements ModelInterface
{
    protected $db;

    /**
     * CountryModel constructor.
     * @param $pdo
     */
    public function __construct($pdo)
    {
        $this->db=ObjectFactoryService::getDb(require 'Config/config.php');
    }

    /**
     * @return mixed
     */
    public function getCountries(){
        $sql = 'SELECT * FROM country';
        var_dump($sql);
        try{
            $statement = $this->db->query($sql);
            $result = $statement->fetchAll(PDO::FETCH_COLUMN);
            sort($result);
            return $result;
        } catch (PDOException $e){
            echo "Failed constructing the query: " . $e->getMessage();
        }
    }
}