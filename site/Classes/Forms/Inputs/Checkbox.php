<?php
/**
 * Class InputCheckbox
 */
class Checkbox extends BaseInput implements InputInterface
{
    public $valueString;

    public function __construct(){
        $this->type = 'checkbox';
        $this->value = true;
        $this->required = false;
    }

    public function getInput(){
        return "<input type=\"checkbox\" name=\"$this->name\" value=\"$this->value\"> $this->valueString";
    }

    /**
     * @return mixed
     */
    public function getValueString()
    {
        return $this->valueString;
    }

    /**
     * @param mixed $valueString
     * @return $this
     */
    public function setValueString($valueString)
    {
        $this->valueString = $valueString;
        return $this;
    }
}