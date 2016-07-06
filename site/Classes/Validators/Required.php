<?php

namespace Validators;
/**
 * Required Validator
 */
class Required implements ValidatorInterface
{
    /**
     * Returns true if required otherwise false
     * @param null $value
     * @return bool
     */
    public function validate($value = null)
    {
        if (!empty($value)) return true;
        return true;
    }
}