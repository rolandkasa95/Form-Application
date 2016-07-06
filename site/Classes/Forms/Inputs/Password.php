<?php

namespace Forms\Inputs;
/**
 * Password Input Class
 */
class Password extends BaseInput implements InputInterface
{
    /**
     * Password constructor.
     */
    public function __construct(){
        $this->type = 'password';
        $this->required = true;
    }

    /**
     * @return string
     */
    public function getInput()
    {
        $required = $this->required ? ' required' : null;
        return "<input type=\"$this->type\" name=\"$this->name\" $required/>";
    }
}