<?php

class Text extends BaseInput implements InputInterface
{
    /**
     * Text constructor.
     */
    public function  __construct()
    {
        $this->type = 'text';
        $this->required= false;
    }

    /**
     * @return string
     */
    public function getInput()
    {
        return "<input type=\"$this->type\" name=\"$this->name\" $this->required";
    }

}