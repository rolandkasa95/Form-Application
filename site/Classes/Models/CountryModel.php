<?php
/**
 * Country Model Class
 */

class CountryModel implements ModelInterface
{
    protected $db;

    /**
     * @param $pdo
     */
    public function __construct($pdo){
        $this->db = $pdo;
    }

    /**
     * @return mixed
     */
    public function getCountries(){
        $sql = 'SELECT name FROM country';
        try{
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_COLUMN);
            var_dump($results);
            sort($results);
            return $results;
        }catch(PDOException $e){
            //Log error ...
            echo $e->getMessage();
        }
    }
}