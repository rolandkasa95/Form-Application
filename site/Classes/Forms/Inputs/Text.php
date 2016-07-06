<?php

namespace Forms\Inputs;
/**
 * Text Input Class
 */
class Text extends BaseInput implements InputInterface
{
    /**
     * Text constructor.
     */
    public function __construct(){
        $this->type = 'text';
        $this->required = false;
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