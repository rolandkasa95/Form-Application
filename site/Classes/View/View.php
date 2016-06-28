<?php

class View
{
    public $results;


    /**
     * setter
     *
     * @param $results
     */
    public function setResults($results){
        $this->results = $results;
    }

    /**
     * Add a new property to the Class
     *
     * @param $param
     * @param $value
     */
    public function set($param,$value){
        $this->$param = $value;
    }

}