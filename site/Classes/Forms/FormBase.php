<?php

abstract class FormBase
{
    public $models = [];
    public $config = [];
    protected $fields = [];
    protected $data;
    public $isValid;

    public function __construct($models,$params = null)
    {
        $this->models = $models;
        $this->config = $params;
    }


}