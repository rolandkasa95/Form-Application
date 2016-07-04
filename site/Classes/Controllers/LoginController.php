<?php

class LoginController extends AppController
{
    public function init(){
        $this->form = ObjectFactoryService::getForm('LoginForm', $this->models);

        //Set the token field into the session
        $this->saveSessionToken();

        $this->view = new View();

        $this->view->set('form', $this->form);
        $this->view ->render('login');

        if ($_POST && $_POST['submit']) {
            $session = ObjectFactoryService::getSession();
            $token = $session->get('token');
    }
    /**
     * Login page loaded
     */
    public function login()
    {
        $this->models = configController::getModels();
        //Code to authenticate user

        var_dump($this->form);
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

}