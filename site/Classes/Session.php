<?php

class Session
{
    public $session;

    public function __construct()
    {
        session_start();
        $this->session = &$_SESSION;
    }


    /**
     * Saves the user to the session
     *
     * @param null $data
     */
    public function save($data = null){
        foreach($data as $key => $value){
            $this->session[$key] = $value;
        }
    }
}