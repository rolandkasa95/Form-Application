<?php

class RegisterController extends AppController
{
    /**
     * Register Page initiation
     */
    public function init(){
        $this->models = configController::getModels();
        $this->form = ObjectFactoryService::getForm('RegisterForm', $this->models);

        //Set the token field into the session
        $this->saveSessionToken();

        $this->view = new View();

        $this->view->set('form', $this->form);
        $this->view->render('register');
    }

    /**
     * After registration Page initiation
     */
    public function register()
    {
        //Code to save the new user
        $this->models['user']->saveUser($this->form->getData());

        //Say "thanks"
        $this->view->render('thanks');
    }
}