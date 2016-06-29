<?php

class LoginForm extends FormCommon implements FormInterface
{
    public function __construct($models)
    {
        $params = [
            'name' => 'login',
            'id' => 'form1',
            'method' => 'POST',
            'action' => 'index.php'
        ];

        parent::__construct($models, $params);

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

        $button = $this->getField('Submit');
        $button->setValue('logion');

        ksort($this->fields);
    }
}