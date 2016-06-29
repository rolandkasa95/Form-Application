<?php
/**
 * Submit Input Class
 */
class Submit extends BaseInput implements InputInterface
{
    public function __construct()
    {
        $this->type = 'submit';
        $this->name = 'submit';
        $this->value = 'Submit';
    }

    /**
     * @return string
     */
    public function getInput(){
        return "<input type=\"$this->type\" name=\"$this->name\" value=\"$this->value\"/>";
    }
}