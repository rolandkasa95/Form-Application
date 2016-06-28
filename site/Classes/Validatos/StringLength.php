<?php

class StringLength implements ValidatorInterface
{
    public $maximum;
    public $minimum;

    /**
     * @param null $value
     * @return bool
     */
    public function validate($value = null)
    {
        if (empty($value)) return false;
        if (!is_string($value || $this->minimum || $this->maximum)) return false;
        if (strlen($value)<$this->maximum && strlen($value)>$this->minimum){
            return true;
        }
        return false;
    }

    /**
     * @param mixed $maximum
     */
    public function setMaximum($maximum)
    {
        $this->maximum = $maximum;
    }

    /**
     * @param mixed $minimum
     */
    public function setMinimum($minimum)
    {
        $this->minimum = $minimum;
    }

    /**
     * @param null $data
     */
    public function setValues($data = null){
        foreach ($data as $key => $value){
            $this->$key = $value;
        }
    }

}