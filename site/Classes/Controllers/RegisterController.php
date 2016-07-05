<?php
namespace Controllers;

use Views\View;

class RegisterController extends AppController
{
    /**
     * Register Page initiation
     */
    public function init(){
        $this->models = configController::getModels();
        $this->form = \ObjectFactoryService::getForm('RegisterForm', $this->models);

        //Set the token field into the session
        $this->saveSessionToken();

        $this->view = new View();

        $this->view->setForm( $this->form );
        $this->view->render('register');
    }
}