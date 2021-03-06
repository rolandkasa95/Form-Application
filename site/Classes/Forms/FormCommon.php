<?php
namespace Forms;
/**
 * Abstract Form Common Class
 */

abstract class FormCommon extends FormBase
{
    /**
     * This function adds a token to the user,
     * whenever enters the site, for keeping out,
     * unwanted guests (CSRF protection)
     *
     * @param $models
     * @param array $params
     * @internal param $model
     */
    public function __construct($models, $params)
    {
        parent::__construct($models, $params);

        //Add a hidden token for CSRF protection
        $token = md5(time());
        $this->addField([
            'name' => 'token',
            'type' => 'hidden',
            'value' => $token,
            'priority' => 99,
            'validator' => 'token',
        ]);

        //Add a submit button
        $this->addField([
            'name' => 'submit',
            'type' => 'submit',
            'value' => 'Submit',
            'priority' => 100,
        ]);
    }
}