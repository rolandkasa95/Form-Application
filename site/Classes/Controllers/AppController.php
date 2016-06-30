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
        $config = require 'Config/config.php';
        $this->models = [
            'user' => ObjectFactoryService::getModel('UserModel', $config),
            'country' => ObjectFactoryService::getModel('CountryModel', $config)
        ];
        $this->view = new View();

        //Present login or registration form
        if (!$_POST && empty($_GET['action'])) {
            $this->form = ObjectFactoryService::getForm('LoginForm', $this->models);

            //Set the token field into the session
            $this->saveSessionToken();

            $this->view->set('form', $this->form);
            $this->view->render('login');
        } //Present register form
        elseif ($_GET && $_GET['action'] === 'register') {
            $this->form = ObjectFactoryService::getForm('RegisterForm',
$this->models);

            //Set the token field into the session
            $this->saveSessionToken();

            $this->view->set('form', $this->form);
            $this->view->render('register');
        }

        //Process submitted form
        elseif ($_POST && $_POST['submit']) {
            $session = ObjectFactoryService::getSession();
            $token = $session->get('token');

            if ($_POST['submit'] === 'login') $this->form = ObjectFactoryService::getForm('LoginForm', $this->models);
            if ($_POST['submit'] === 'register') $this->form = ObjectFactoryService::getForm('RegisterForm', $this->models);

            //Pull the token from the session and set it in the form for validation
            $this->form->setField('token', $token);

            $this->form->setData($_POST);
            if ($this->form->validate()) {
                if ($this->form->config['name'] === 'login') $this->login();
                if ($this->form->config['name'] === 'register') $this->register();
            } else {
                $this->view->render('invalid');
            }
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
     * Login user
     */
    public function login()
    {
        //Code to authenticate user
        $user = $this->models['user']->authenticate($this->form->getData());
        if ($user) {
            $this->view->user = $user;
            //Render some "Welcome"
            $this->view->render('welcome');
        } else {
            //Show no remorse
            $this->view->render('invalid');
        }
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

    /**
     * Register new user
     */
    public function register()
    {
        //Code to save the new user
        $this->models['user']->saveUser($this->form->getData());

        //Say "thanks"
        $this->view->render('thanks');
    }
}