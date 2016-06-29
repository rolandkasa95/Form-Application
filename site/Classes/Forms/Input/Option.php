<?php

class Option
{
    protected $label;
    protected $disabled = false;
    protected $selected = false;
    protected $value;
    protected $optionString;

    /**
     * @return string
     */
    public function getOption(){
        $option = "<option ";
        $option .= $this->value ? " value=\"{$this->value}\"" :null;
        $option .= $this->disabled ? " disabled" :null;
        $option .= $this->label ? "label=\"{$this->label}\"" : null;
        $option .= $this->selected ? " selected" : null;
        $option .= ">" . $this->optionString . "</option>";
        return $option;
    }

    /**
     * @param $options
     * @return bool
     */
    public function getOptions($options){
        $result = null;
        foreach ($options as $option) {
            $value = ucwords($option);
            $this->value = $value;
            $this->optionString = $value;
            $result[] = $this->getOption($option);
        }
        return $result ?:false;
    }

    /**
     * @return mixed
     */
    public function getOptionString(){
       return $this->optionString;
    }

    public function setOptionString($param){
        $this->optionString = $param;
        return $this;
    }

     /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param $label
     * @return $this
     */
    public function setLabel($label){
        $this->label = $label;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isDisabled()
    {
        return $this->disabled;
    }

    /**
     * @param boolean $disabled
     * @return $this
     */
    public function setDisabled($disabled)
    {
        $this->disabled = $disabled;
        return $this;
    }
}