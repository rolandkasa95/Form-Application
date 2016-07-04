<?php

class submitDataController
{
    public function Submit(){
        $session = ObjectFactoryService::getSession();
        $token = $session->get('token');

        if ($_POST['submit'] === 'login') $this->form = ObjectFactoryService::getForm('LoginForm', $this->models);
        if ($_POST['submit'] === 'register') $this->form = ObjectFactoryService::getForm('RegisterForm', $this->models);

        //Pull the token from the session and set it in the form for validation
        $this->form->setField('token', $token);

        $this->form->setData($_POST);
        if ($this->form->validate()) {
            if ($this->form->config['name'] === 'login') $loginController->login();
            if ($this->form->config['name'] === 'register') $registerController->register();
        } else {
            $this->view->render('invalid');
        }
    }
}