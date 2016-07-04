<?php
namespace Controllers;

class LoginController extends AppController
{
    public function init(){
        $this->form = ObjectFactoryService::getForm('LoginForm', $this->models);

        //Set the token field into the session
        $this->saveSessionToken();


        $this->view = new View();

        $this->view->set('form', $this->form);
        $this->view ->render('login');
    }

}