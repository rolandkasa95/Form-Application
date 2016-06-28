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

    /**
     * Requiring the Layouts of the parameter give
     *
     * @param $param
     */
    public function render($param){
        $param = strtolower($param);
        require LAYOUTS . $param . '.php';
    }

}