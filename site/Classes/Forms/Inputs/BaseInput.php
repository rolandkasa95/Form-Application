<?php
/**
 * Abstract BaseInput Class
 */
abstract class BaseInput{
    protected $type;
    protected $name;
    protected $label;
    protected $value;
    protected $required;
    protected $valid;
    protected $validators;

    /**
     * @param $param
     * @return $this
     */
    public function setValue($param){
        $this->value = $param;
        return $this;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return $this
     */
    public function setRequired()
    {
        $this->required = true;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isRequired()
    {
        return $this->required;
    }

    /**
     * @param $param
     * @return $this
     */
    public function setType($param){
        $this->type = $param;
        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getValidators()
    {
        return $this->validators;
    }

    /**
     * @param mixed $param
     * @return $this
     */
    public function setValidators($param)
    {
        if(is_array($param)){
            foreach($param as $key => $value){
                if(is_string($key)){
                    require_once CLASSES . 'Validators/' . ucfirst($key) . '.php';
                    $validator = new $key;
                    if(is_array($value)){
                        $validator->setValues($value);
                    }
                    $this->validators[] = $validator;
                } elseif (is_numeric($key)){
                    require_once CLASSES . 'Validators/' . ucfirst($value) . '.php';
                    $this->validators[] = new $value;
                }
            }
        } else {
            require_once CLASSES . 'Validators/' . ucfirst($param) . '.php';
            $this->validators[] = new $param;
        }
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLabelTag()
    {
        return "<label for=\"" . strtolower($this->label) . "\">" . ucwords($this->label) . "</label>";
    }

    /**
     * @param mixed $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @return boolean
     */
    public function isValid()
    {
        return $this->valid;
    }

    /**
     * @return $this
     */
    public function setValid()
    {
        $this->valid = true;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
}