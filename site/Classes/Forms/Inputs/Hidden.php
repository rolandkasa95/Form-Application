<?php

namespace Forms\Inputs;
/**
 * Hidden Input Class
 */
class Hidden extends BaseInput implements InputInterface
{
    /**
     * Hidden constructor.
     */
    public function __construct(){
        $this->type = 'hidden';
    }

    /**
     * @return string
     */
    public function getInput(){
        return "<input type=\"$this->type\" name=\"$this->name\" value=\"$this->value\"/>";
    }
}