<?php
/**
 * Register Form Class
 */
class RegisterForm extends FormCommon implements FormInterface
{
    /**
     * @param $models
     */
    public function __construct($models)
    {
        $params = [
            'name' => 'register',
            'id' => 'form1',
            'method' => 'post',
            'action' => 'index.php',
        ];
        parent::__construct($models, $params);

        //Add username
        $this->addField([
            'label' => 'Username',
            'type' => 'text',
            'name' => 'username',
            'priority' => 1,
            'required' => true,
            'value' => '',
            'validator' => [
                'StringLength' => [
                    'minimum' => 2,
                    'maximum' => 30,
                ],
                'Alnum',
                'required',
            ],
        ]);

        //Add password
        $this->addField([
            'label' => 'Password',
            'type' => 'password',
            'name' => 'password',
            'priority' => 2,
            'required' => true,
            'value' => '',
            'validator' => [
                'StringLength' => [
                    'minimum' => 10,
                    'maximum' => 30,
                ],
                'required',
            ],
        ]);

        //Add first name
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
                    'maximum' => 30,
                ],
                'Alpha',
                'required',
            ],
        ]);

        //Add last name
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
                    'maximum' => 30,
                ],
                'alpha',
                'required',
            ],
        ]);

        //Add email
        $this->addField([
            'label' => 'Email',
            'type' => 'text',
            'name' => 'email',
            'priority' => 5,
            'required' => true,
            'value' => '',
            'validator' => [
                'email',
                'required'
            ],
        ]);

        //Add email preferred contact
        $this->addField([
            'label' => 'Contact By Email',
            'type' => 'checkbox',
            'name' => 'email_preferred_contact',
            'priority' => 6,
            'required' => true,
            'value' => false,
            'validator' => [
                'boolean',
            ],
        ]);

        //Add country and data options
        $countries = $this->models['country']->getCountries();
        $this->addField([
            'label' => 'Country',
            'type' => 'select',
            'name' => 'country',
            'multiple' => false,
            'priority' => 7,
            'required' => true,
            'value' => '',
            'options' => $countries,
            'validator' => [
                'InArray' => $countries,
                'required',
            ],
        ]);

        //Adjust the button attributes
        $button = $this->getField('Submit');
        $button->setValue('register');

        //Sort the fields by priority
        ksort($this->fields);
    }
}