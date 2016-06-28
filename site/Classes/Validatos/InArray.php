<?php

class InArray implements ValidatorInterface
{
    public $values = [];

    /**
     * @param $value
     * @return bool
     */
    public function validate($value)
    {
        if ($this->values && in_array($value,$this->values)){
            return true;
        }
        return false;
    }

    /**
     * @param array $values
     */
    public function setValues(array $values){
        $this->values = $values;
    }

}