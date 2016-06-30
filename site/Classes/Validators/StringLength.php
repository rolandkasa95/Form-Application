<?php
/**
 * StringLength Validator
 */
class StringLength implements ValidatorInterface
{
    public $minimum;
    public $maximum;

    /**
     * @param null $value
     * @return bool
     */
    public function validate($value = null){
        if(!is_string($value)
            || !$this->minimum
            || !$this->maximum)return false;
        $length = strlen($value);
        if($length <= $this->maximum && $length >= $this->minimum) {
            return true;
        }
        return false;
    }

    /**
     * @param $values
     */
    public function setValues($values){
        foreach($values as $key => $value){
            $this->$key = $value;
        }
    }

    /**
     * @param $value
     */
    public function setMinimum($value){
        $this->minimum = $value;
    }

    /**
     * @param $value
     */
    public function setMaximum($value){
        $this->maximum = $value;
    }
}