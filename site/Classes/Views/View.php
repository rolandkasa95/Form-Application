<?php

namespace Views;
/**
 * View Class
 */
class View {
    public $results;
    
    private $form;

    /**
     * @param $results
     */
    public function setResults($results){
        $this->results = $results;
    }

    /**
     * @param $param
     * @param $value
     */
    public function set($param, $value){
        $this->$param = $value;
    }

    /**
     * @param $param
     */
    public function render($param){
        $param = strtolower($param);
        require LAYOUTS . "$param.php";
    }

    /**
     * @return mixed
     */
    public function getForm()
    {
        return $this->form;
    }

    /**
     * @param mixed $form
     */
    public function setForm($form)
    {
        $this->form = $form;
    }
}