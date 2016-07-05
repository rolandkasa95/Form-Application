<?php
namespace Controllers;

use Views\View;

class submitDataController extends AppController
{
    
    /**
     * Submit data to the Database
     */
    public function Submit(){
        $session = \ObjectFactoryService::getSession();
        $token = $session->get('token');

        $this->view = new View();

        if ('login' === $_POST['submit']) {
            
            $this->form = \ObjectFactoryService::getForm('LoginForm', $this->models);
        }
        if ('register' === $_POST['submit'])
            $this->form = \ObjectFactoryService::getForm('RegisterForm', $this->models);
        

        //Pull the token from the session and set it in the form for validation
        $this->form->setField('token', $token);

        $this->form->setData($_POST);
        if ($this->form->validate()) {
            if ('login' === $this->form->config['name'])
                self::login();
            if ('register' === $this->form->config['name'])
                self::register();
        } else {
            $this->view->render('invalid');
        }
    }

    /**
     * Login page loaded
     */
    public function login()
    {
        $this->models = configController::getModels();
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
     * After registration Page initiation
     */
    public function register()
    {
        $this->models = configController::getModels();
        
        //Code to save the new user
        $this->models['user']->saveUser($this->form->getData());

        //Say "thanks"
        $this->view->render('thanks');
    }
}