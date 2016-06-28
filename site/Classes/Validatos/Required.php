<?php

class Required implements ValidatorInterface
{
    /**
     * @param $value
     * @return bool
     */
    public function validate($value)
    {
        if (!empty($value)) return true;
        return false;
    }

}