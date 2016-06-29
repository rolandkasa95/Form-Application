<?php

class Checkbox extends BaseInput implements InputInterface
{
    public $valueString;

    public function __construct()
    {
        $this->type = 'checkbox';
        $this->value = true;
        $this->required = false;
    }

}