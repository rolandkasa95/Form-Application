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

    public function generateField($field){
        $newField = '';
        switch ($field['type']){
            case 'text':
                require_once CLASSES . 'Forms/Input/Text.php';
                $newField = new Text();
                $field['type'] ? $newField->setType($field['type']) :null;
                $field['label'] ? $newField->setLabel($field['label']) : null;
                $field['name'] ? $newField->setName($field['name']) :null;
                $field['validator'] ? $newField->setValidator($field['validator']) : null;
                break;
            case 'password':
                require_once CLASSES . 'Forms/Input/Password.php';
                $newField = new Password();
                $field['type'] ? $newField->setType($field['type']) :null;
                $field['label'] ? $newField->setLabel($field['label']) : null;
                $field['name'] ? $newField->setName($field['name']) :null;
                $field['validator'] ? $newField->setValidator($field['validator']) : null;
                break;
            case 'submit':
                require_once CLASSES . 'Forms/Input/Submit.php';
                $newField = new Submit();
                break;
            case 'checkbox':
                require_once CLASSES . 'Forms/Input/Checkbox.php';
                $newField = new Checkbox();
                $field['type'] ? $newField->setType($field['type']) :null;
                $field['label'] ? $newField->setLabel($field['label']) : null;
                $field['name'] ? $newField->setName($field['name']) :null;
                $field['validator'] ? $newField->setValidator($field['validator']) : null;
                break;
            case 'select':
                require_once CLASSES. 'Forms/Input/Option.php';
                require_once  CLASSES . 'Forms/Input/Select.php';
                $newField = new Select();
                $values = null;
                $field['multiple'] ? $newField->setMultiple($field['multiple']);
                $field['options'] ? $newField->setType($field['options']) :null;
                $field['label'] ? $newField->setLabel($field['label']) : null;
                $field['name'] ? $newField->setName($field['name']) :null;
                $field['validator'] ? $newField->setValidator($field['validator']) : null;
                break;
        }
    }
}