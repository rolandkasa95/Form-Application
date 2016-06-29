<?php

require 'FormBase.php';

abstract class FormCommon extends FormBase
{

    /**
     * FormCommon constructor.
     * @param $models
     * @param $param
     *
     * @internal $param
     */
    public function __construct($models,$param)
    {
        /**
         * Calling the FormBase construct
         */
        parent::__construct($models,$param);
        $token = md5(time());
        $this->addField([
            'name' => 'token',
            'type' => 'hidden',
            'value' => $token,
            'priority' => 99,
            'validator' => 'token',
        ]);

        $this->addField([
            'name' => 'submit',
            'type' => 'submit',
            'value' => 'submit',
            'priority' => 100,
        ]);
        
    }

}