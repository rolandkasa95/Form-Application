<?php
/**
 * Alnum Validator
 */
class Alnum implements ValidatorInterface
{
    /**
     * @param null $value
     * @return bool
     */
    public function validate($value = null)
    {
        if (empty($value)) return false;

        if (ctype_alnum($value)) {
            return true;
        }
        return false;
    }
}