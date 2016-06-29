<?php

class RegisterForm extends FormCommon implements FormInterface
{
    public function __construct($models)
    {
        $param = [
            'name' => 'register',
            'id' => 'form1',
            'method' => 'post',
            'action' => 'index.php'
        ];
        parent::__construct($models, $param);

        $this->addField([
            'label' => 'Username',
            'type' => 'text',
            'name' => 'username',
            'priority' => 1,
            'required' => true,
            'value' => '',
            'validator' => [
                'StringLength' => [
                    'minimum' => 5,
                    'maximum' => 40
                ],
                'alnum',
                'required',
            ],
        ]);

        $this->addField([
            'label' => 'Password',
            'type' => 'password',
            'name' => 'password',
            'priority' => 2,
            'required' => true,
            'value' => '',
            'validator' => [
                'StringLength' => [
                    'minimum' => 8,
                    'maximum' => 100,
                ],
                'required',
            ],
        ]);
    }
}