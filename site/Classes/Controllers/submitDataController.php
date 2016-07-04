<?php

class submitDataController extends AppController
{
    
    /**
     * Submit data to the Database
     */
    public function Submit(){
        $session = ObjectFactoryService::getSession();
        $token = $session->get('token');

        $this->view = new View();

        if ($_POST['submit'] === 'login') $this->form = ObjectFactoryService::getForm('LoginForm', $this->models);
        if ($_POST['submit'] === 'register') $this->form = ObjectFactoryService::getForm('RegisterForm', $this->models);

        //Pull the token from the session and set it in the form for validation
        $this->form->setField('token', $token);

        $this->form->setData($_POST);
        if ($this->form->validate()) {
            if ($this->form->config['name'] === 'login') self::login();
            if ($this->form->config['name'] === 'register') self::register();
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