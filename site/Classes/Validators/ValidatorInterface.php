<?php

namespace Validators;
/**
 * Validator Interface
 */
interface ValidatorInterface
{
    /**
     * @param $value
     * @return mixed
     */
    public function validate($value);
}