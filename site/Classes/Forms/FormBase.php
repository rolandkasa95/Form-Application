<?php

abstract class FormBase
{
    public $models = [];
    public $config = [];
    protected $fields = [];
    protected $data;
    public $isValid;


    /**
     * FormBase constructor.
     * @param $models
     * @param null $params
     */
    public function __construct($models,$params = null)
    {
        $this->models = $models;
        $this->config = $params;
    }

    /**
     * @return string
     */
    public function getStartTag(){
        $config = $this->config;
        $form = "<form";
        $form .= $config['id'] ? "id = \"{$config['id']}\"" :null;
        $form .= $config['name'] ? " name=\"{$config['name']}\"" : null;
        $form .= $config['action'] ? " action=\"{$config['action']}\"" : null;
        $form .= $config['method'] ? " method=\"{$config['method']}\"" : null;
        $form .= '>';
        return $form;
    }


}