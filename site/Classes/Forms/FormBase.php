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

    public function generateFields(){
        $config = $this->config;
        $newField = null;
        foreach ($config['fields'] as $field){
            $newField = $this->generateField($field);
        }
        if(!$newField){
            return false;
        }else{
            !empty($field['value']) ?$newField->setValue($field['value']) :null;
            !empty($field['name']) ?$newField->setName($field['name']) :null;
            !empty($field['required']) ? $newField->setRequired($field['required']) : null;
            !empty($filed['priority']) ? $this->fields[$field['priority']] = $newField :null;
        }
        ksort($this->fields);
        return true;
    }
}