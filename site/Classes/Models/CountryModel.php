<?php

namespace Models;
/**
 * Country Model Class
 */

class CountryModel implements ModelInterface
{
    /**
     * @var \PDO
     */
    protected $db;

    /**
     * @param $pdo
     */
    public function __construct($pdo){
        $this->db = \ObjectFactoryService::getDb(\ObjectFactoryService::getConfig());
    }

    /**
     * @return mixed
     */
    public function getCountries(){
        $sql = 'SELECT name FROM country';
        try{
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $results = $stmt->fetchAll(\PDO::FETCH_COLUMN);
            sort($results);
            return $results;
        }catch(\PDOException $e){
            //Log error ...
            echo $e->getMessage();
        }
    }

    public function getCountriesInhabits($result){
        $sql = 'SELECT inhabits from country WHERE name=\"' . $result . "\"";
        try{
            $statement = $this->db->prepare($sql);
            $statement->execute();
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            var_dump($result);
            sort($result);
            return $result;
        }catch (\PDOException $e){
            echo "Failed connecting:" . $e->getMessage();
        }
    }
}