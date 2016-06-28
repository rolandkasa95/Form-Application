<?php

class Boolean implements ValidatorInterface
{
    /**
     * @param $value
     * @return bool
     */
    public function validate($value)
    {
        if ($value == 0 || $value == 1)return true;
        return false;
    }

}