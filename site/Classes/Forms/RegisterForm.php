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

        $this->addField([
           'label' => 'First Name',
            'type' => 'text',
            'name' => 'first_name',
            'priority' => 3,
            'required' => true,
            'value' => '',
            'validator' => [
                'StringLength' => [
                    'minimum' => 2,
                    'maximum' => 40,
                ],
                'Alpha',
                'required',
            ],
        ]);

        $this->addField([
            'label' => 'Last Name',
            'type' => 'text',
            'name' => 'last_name',
            'priority' => 4,
            'required' => true,
            'value' => '',
            'validator' => [
                'StringLength' => [
                    'minimum' => 2,
                    'maximum' => 40,
                ],
                'Alpha',
                'required',
            ],
        ]);

        $this->addField([
           'label' => 'Email',
            'type' => 'text',
            'name' => 'email',
            'priority' => 5,
            'required' => true,
            'value' => '',
            'validators' => [
                'email',
                'required',
            ],
        ]);

        $countries = $this->models['country']->getCountries();
        $this->addField([
            'label' => 'Contact By Email',
            'type' => 'checkbox',
            'name' => 'email_preferred_contact',
            'priority' => 6,
            'required' => true,
            'value' => false,
            'options' => $countries,
            'validator' => [
                'InArray' => $countries,
                'required',
            ],
        ]);

        $button = $this->getField('Submit');
        $button->setValue('register');

        ksort($this->fields);
    }
}