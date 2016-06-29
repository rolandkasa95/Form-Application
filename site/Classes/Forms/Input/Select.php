<?php

class Select extends BaseInput implements InputInterface
{
    protected $multiple = false;
    protected $options = [];

    /**
     * Select constructor.
     */
    public function __construct()
    {
        $this->valid = false;
        $this->required = false;
    }

    public function getInput()
    {
        $select = "<select ";
        $select .= $this->name ? " name=\"$this->name\"" : null;
        $select .= $this->required ? " required" : null;
        $select .= $this->multiple ? " multiple" : null;
        $select .= ">";
        foreach ($this->options as $option){
            $select .= $option;
        }
        $select .= "</select>";
        return $select;
    }

     /**
     * @return boolean
     */
    public function isMultiple()
    {
        return $this->multiple;
    }

    /**
     * @param $multiple
     * @return mixed
     */
    public function setMultiple($multiple){
        $this->multiple = $multiple;
        return $multiple;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param array $options
     * @return $this
     */
    public function setOptions($options)
    {
        $this->options = $options;
        return $this;
    }
}