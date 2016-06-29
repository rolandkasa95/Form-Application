<?php

class Hidden extends BaseInput implements InputInterface
{
    public function __construct(){
        $this->type = 'hidden';
    }

    public function getInput()
    {
        return "<input type=\"" . $this->type . "\" name=\"" . $this->name . "\" value=\"" . $this->value . "\"";
    }
}