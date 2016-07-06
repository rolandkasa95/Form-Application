<?php

namespace Validators;
/**
 * InArray Validator
 */
class InArray implements ValidatorInterface
{
    /**
     * @var array
     */
    public $values = [];

    /**
     * Gets a value, checks if is in the array
     *
     * @param null $value
     * @return bool
     */
    public function validate($value = null)
    {
        if ($this->values && in_array($value, $this->values)) {
            return true;
        }
        return false;
    }

    /**
     * Setter for $values
     *
     * @param array $values
     */
    public function setValues(array $values)
    {
        $this->values = $values;
    }
}