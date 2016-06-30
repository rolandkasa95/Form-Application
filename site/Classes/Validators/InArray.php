<?php
/**
 * InArray Validator
 */
class InArray implements ValidatorInterface
{

    public $values = [];

    public function validate($value = null)
    {
        if ($this->values && in_array($value, $this->values)) {
            return true;
        }
        return false;
    }

    public function setValues(array $values)
    {
        $this->values = $values;
    }
}