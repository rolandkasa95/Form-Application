<?php

class AppController
{
    const USERS_TABLE = 'users';
    protected $form;
    protected $view;
    protected $models;

    public function init()
    {
        $config = require 'Config/config.php';
        $this->models = ['user' => ObjectFactoryService::getModel('UserModel',$config),
        'country'=> ObjectFactoryService::getModel('CountryModel',$config)];
        $this->view = new View();

        if(!$_POST && empty($_GET['action'])){
            $this->form = ObjectFactoryService::getForm('LoginForm',$this->models);
            $this->saveSessionToken();
            $this->view->set('form',$this->form);
            $this->view->render('login');
        }elseif ($_GET && $_GET['action']){
            $this->form = ObjectFactoryService::getForm('RegisterForm',$this->models);
            $this->saveSessionToken();
            $this->view->set('form',$this->form);
            $this->view->render('register');
        }elseif ($_POST && $_POST['submit']){
            $session = ObjectFactoryService::getSession();
            $token = $session->get('token');
            if ($_POST['submit'] === 'login') $this->form = ObjectFactoryService::getForm('LoginForm', $this->models);
            if ($_POST['submit'] === 'register') $this->form = ObjectFactoryService::getForm('RegisterForm', $this->models);
            $this->form->setField('token',$token);
            $this->form->setData($_POST);
            if ($this->form->validate()) {
                if ($this->form->config['name'] === 'login') $this->login();
                if ($this->form->config['name'] === 'register') $this->register();
            } else {
                $this->view->render('invalid');
            }
        }elseif ($_GET && $_GET['action'] === 'logout') {
            $this->logout();
        }
    }
}