<?php
/**
 * Login Form Class
 */
class LoginForm extends FormCommon implements FormInterface
{
    /**
     * @param $models
     */
    public function __construct($models)
    {
        $params = [
            'name' => 'login',
            'id' => 'form1',
            'method' => 'post',
            'action' => 'index.php',
        ];
        parent::__construct($models, $params);

        //Add a username field
        $this->addField([
            'label' => 'Username',
            'type' => 'text',
            'name' => 'username',
            'priority' => 1,
            'required' => true,
            'value' => '',
            'validator' => [
                'StringLength' => [
                    'minimum' => 8,
                    'maximum' => 30,
                ],
                'alnum',
                'required',
            ],
        ]);

        //Add a password field
        $this->addField([
            'label' => 'Password',
            'type' => 'password',
            'name' => 'password',
            'priority' => 2,
            'required' => true,
            'value' => '',
            'validator' =>[
                'StringLength' => [
                    'minimum' => 8,
                    'maximum' => 30,
                ],
                'required',
            ],
        ]);

        //Adjust the button attributes
        $button = $this->getField('Submit');
        $button->setValue('login');

        //Sort the fields by priority
        ksort($this->fields);
    }
}