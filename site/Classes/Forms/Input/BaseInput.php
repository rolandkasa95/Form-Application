<?php

abstract class BaseInput
{
    protected $type;
    protected $name;
    protected $label;
    protected $value;
    protected $required;
    protected $valid;
    protected $validators;


    /**
     * @param $param
     * @return $this
     */
    public function setValue($param){
        $this->value = $param;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValue(){
        return $this->value;
    }
}