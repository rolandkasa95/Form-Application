<?php

namespace Validators;
/**
 * Token Validator
 */
class Token implements ValidatorInterface
{
    /**
     * If the token is equal to the session token returns true,
     * otherwise false
     *
     * @param null $value
     * @return bool
     */
    public function validate($value){
        if(empty($value))return false;
        $session = \ObjectFactoryService::getSession();
        $token = $session->get('token');
        if($value === $token)return true;
        return false;
    }
}