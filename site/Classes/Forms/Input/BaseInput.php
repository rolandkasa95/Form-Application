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
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return $this
     */
    public function setRequired()
    {
        $this->required = true;
        return $this;
    }

     /**
     * @return mixed
     */
    public function getRequired()
    {
        return $this->required;
    }

    public function isRequired(){
        return $this->required;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

     /**
     * @return mixed
     */
    public function getValidators()
    {
        return $this->validators;
    }
}