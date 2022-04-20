<?php

class AdminController extends Controller
{
    public function __construct()
    {
        $model = new Users();
        $user_id =  App::session()->get('user_id');
        $user = $model->select()->where(['id'=>$user_id])->first();
        if($user['role'] != 1){
            $this->redirect('user/profile');
        }
    }
    public function adminAction(){
        $model = new Users();
        if(!$model->isLoggedIn()){
            $this->redirect('user/login');
        }
        $prod = new Product();
        $prods = $prod->select()->get();
        $user_id =  App::session()->get('user_id');
        $user = $model->select()->where(['id'=>$user_id])->first();
        $this->render('user/admin',[
            'user'=>$user,
            'products' => $prods
        ]);
    }

    public function  adduserAction(){
        $this->render('user/adduser');
    }

}