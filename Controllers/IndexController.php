<?php

class indexController extends Controller {

    public function __construct()
    {
        if(App::session()){
            $this->redirect('user/profile');
        }
    }

    public function indexAction() {
        $this->layout = 'main';
        $this->render('index');
    }


}