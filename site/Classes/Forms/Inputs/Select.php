<?php

namespace Forms\Inputs;
/**
 * Select Input Class
 */
class Select extends BaseInput implements InputInterface
{
    protected $multiple = false;
    protected $options = [];

    public function __construct(){
        $this->valid = false;
        $this->required = false;
    }

    /**
     * @return string
     */
    public function getInput(){
        $select = "<select";
        $select .= $this->name ? " name=\"$this->name\"":null;
        $select .= $this->required ? " required":null;
        $select .= $this->multiple ? " multiple":null;
        $select .= ">";
        $option_object = new Option();
        $results = $option_object->getOptions($this->options);
        foreach ($results as $result){
          $select .= $result;
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
     * @param boolean $multiple
     * @return $this
     */
    public function setMultiple($multiple)
    {
        $this->multiple = $multiple;
        return $this;
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
    public function setOptions(array $options)
    {
        $this->options = $options;
        return $this;
    }
}
