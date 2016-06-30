<?php
/**
 * Required Validator
 */
class Required implements ValidatorInterface
{
    public function validate($value = null)
    {
        if (!empty($value)) return true;
        return false;
    }
}