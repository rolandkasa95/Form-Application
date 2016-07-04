<?php



class LoginController extends AppController
{
    public function init(){
        $this->form = ObjectFactoryService::getForm('LoginForm', $this->models);

        //Set the token field into the session
        $this->$saveSessionToken();

        $this->view->set('form', $this->form);
        $this->view->render('login');
    }
    /**
     * Login page loaded
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

}