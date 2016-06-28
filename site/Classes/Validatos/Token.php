<?php

class Token implements ValidatorInterface
{

    /**
     * @param $value
     * @return bool
     */
    public function validate($value)
    {
        if(empty($value))return false;
        $session= ObjectFactoryService::getSession();
        $token = $session->get('token');
        if($value === $token) return true;
        return false;
    }
}