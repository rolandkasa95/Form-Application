<?php

namespace Controllers;

/**
 * Class AppController
 */
class AppController
{
    const USERS_TABLE = 'users';
    /**
     * @var \Forms\
     */
    public $form;
    /**
     * @var 
     */
    public $view;
    public $models;

    /**
     * Initial Controller method
     */


    public function init()
    {
        $loginController = new LoginController();
        $registerController = new RegisterController();


        //Present login or registration form
        if (!$_POST && empty($_GET['action'])) {
            $loginController->init();
        } //Present register form
        elseif ($_GET &&  'register' === $_GET['action'] ) {
            $registerController->init();
        }

        //Process submitted form
        elseif ($_POST && $_POST['submit']) {
            $submit = new submitDataController();
            $submit->Submit();
        }
        elseif ($_GET && $_GET['action'] === 'logout') {
            $this->logout();
        }
    }

    /**
     * Save session token
     */
    public function saveSessionToken()
    {
        //Set the token field into the session
        $session = \ObjectFactoryService::getSession();
        $session->save(['token' => $this->form->getField('token')->getValue()]);
    }

    /**
     *Logout user
     */
    public function logout()
    {
        $session = \ObjectFactoryService::getSession();
        $session->destroy();
        $url = strip_tags($_SERVER['HTTP_REFERER']);
        header("Location: $url");
        exit;
    }
}
