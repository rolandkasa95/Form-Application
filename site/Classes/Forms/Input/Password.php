<?php

class Password extends BaseInput implements InputInterface
{
    public function __construct()
    {
        $this->type = 'password';
        $this->required = true;
    }

    public function getInput()
    {
        $required = $this->required ? 'required' : null;
        return "<input type=\"$this->type\" name=\"$this->name\" $required";
    }

}