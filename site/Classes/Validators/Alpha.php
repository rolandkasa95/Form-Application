<?php
/**
 * Alpha Validator
 */
class Alpha implements ValidatorInterface
{
    /**
     * @param null $value
     * @return bool
     */
    public function validate($value = null)
    {
        if (empty($value)) return false;

        if (ctype_alpha($value)) {
            return true;
        }
        return false;
    }
}