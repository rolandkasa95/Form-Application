<?php
/**
 * Class AppController
 */
class AppController
{
    const USERS_TABLE = 'users';
    protected $form;
    protected $view;
    protected $models;

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
        elseif ($_GET && $_GET['action'] === 'register') {
            $registerController->init();
        }

        //Process submitted form
        elseif ($_POST && $_POST['submit']) {
           
        } //Logout the user
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
        $session = ObjectFactoryService::getSession();
        $session->save(['token' => $this->form->getField('token')->getValue()]);
    }

    /**
     *Logout user
     */
    public function logout()
    {
        $session = ObjectFactoryService::getSession();
        $session->destroy();
        $url = strip_tags($_SERVER['HTTP_REFERER']);
        header("Location: $url");
        exit;
    }
}
