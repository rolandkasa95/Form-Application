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

    /**
     * @return bool
     */
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

    /**
     * @param $field
     * @return Checkbox|Password|Select|string|Submit|Text
     */
    public function generateField($field){
        $newField = '';
        switch ($field['type']){
            case 'text':
                require_once CLASSES . 'Forms/Inputs/Text.php';
                $newField = new Text();
                $field['type'] ? $newField->setType($field['type']) :null;
                $field['label'] ? $newField->setLabel($field['label']) : null;
                $field['name'] ? $newField->setName($field['name']) :null;
                $field['validator'] ? $newField->setValidators($field['validator']) : null;
                break;
            case 'password':
                require_once CLASSES . 'Forms/Inputs/Password.php';
                $newField = new Password();
                $field['type'] ? $newField->setType($field['type']) :null;
                $field['label'] ? $newField->setLabel($field['label']) : null;
                $field['name'] ? $newField->setName($field['name']) :null;
                $field['validator'] ? $newField->setValidators($field['validator']) : null;
                break;
            case 'submit':
                require_once CLASSES . 'Forms/Inputs/Submit.php';
                $newField = new Submit();
                break;
            case 'checkbox':
                require_once CLASSES . 'Forms/Inputs/Checkbox.php';
                $newField = new Checkbox();
                $field['type'] ? $newField->setType($field['type']) :null;
                $field['label'] ? $newField->setLabel($field['label']) : null;
                $field['name'] ? $newField->setName($field['name']) :null;
                $field['validator'] ? $newField->setValidators($field['validator']) : null;
                break;
            case 'select':
                require_once CLASSES. 'Forms/Inputs/Option.php';
                require_once  CLASSES . 'Forms/Inputs/Select.php';
                $newField = new Select();
                $newField = new Select();
                $values = null;
                $field['multiple'] ? $newField->setMultiple($field['multiple']) : null;
                $field['label'] ? $newField->setLabel($field['label']) : null;
                $field['name'] ? $newField->setName($field['name']) : null;
                $field['options'] ? $newField->setOptions($field['options']) : null;
                $field['validator'] ? $newField->setValidators($field['validator']) : null;
                break;
        }
        return $newField;
    }

    /**
     * @param $field
     * @return bool|Checkbox|Password|Select|string|Submit|Text
     */
    public function addField($field){
        if ($newField = $this->generateField($field)){
            $this->fields[$field['priority']] = $newField;
            return $newField;
        };
        return false;
    }

    /**
     * @param $data
     * @return $this
     */
    public function setData($data){
        $this->data = $data;
        return $this;
    }

    /**
     * @return bool
     */
    public function valudate()
    {
        $invalidCount = 0;
        foreach ($this->data as $key => $value) {
            foreach ($this->fields as $field) {
                if ($field->getName() == $key && $key !== 'submit') {
                    foreach ($field->getValidators() as $validator) {
                        if (!$validator->validate($value)) {
                            $invalidCount++;
                        }
                    }
                    if (!$invalidCount) $field->setValid();
                    break;
                }
            }
        }
        return $this->isValid = $invalidCount ? true:false;
    }

    /**
     * @return array
     */
    public function getFields(){
        return $this->fields;
    }

    /**
     * @param $field
     * @return bool|mixed
     */
    public function getField($field){
//        var_dump($field);
        foreach($this->fields as $value){
            var_dump($value->getName());
            if ($value->getName() === strtolower($field)){
                return $value;
            }
        }
        return false;
    }

    /**
     * @param $field
     * @param $value
     * @return $this
     */
    public function setField($field,$value){
        $test = $this->getField($field);
        $test->setValue($value);
        return $this;
    }

    /**
     * @return string
     */
    public function getEndTag(){
        return '</form>';
    }

}