<?php
class UserController extends Controller{

    public function loginAction(){
        $this->layout = 'login';

          $email = App::request()->post('email');
          $password = App::request()->post('password');
          $model = new Users();
          $user = $model->select('id,password,role')->where(['email'=>$email])->first();

          if(password_verify($password,$user['password'])){
              App::session()->set(['user_id'=>$user['id']]);
              if($user['role'] == 1){
                  $this->redirect('admin/admin');
              }else{
                  $this->redirect('user/profile');
              }


          }

        $this->render('login');
    }

    public function registerAction(){
        $msg = "";
        $user = new Users();
        $user->table='users';
        if(!$user->isLoggedIn()){
            $this->layout = 'login';
        }


        if(App::request()->post('register')){
            $user_email = $user->select()->where(['email'=> App::request()->post('email' )])->first();

            if($user_email != ""){
                $msg = "Error Email";
                if($user->isLoggedIn()){
                    $this->render('adduser',['message'=>$msg]);
                }else{
                    $this->render('register',['message'=>$msg]);
                }
                die();
            }

           if(App::request()->post('password') === App::request()->post('confpassword')){

               $firstname = App::request()->post('firstname');
               $surname = App::request()->post('surname');
               $age = App::request()->post('age');
               $email = App::request()->post('email');
               $password = App::request()->post('password');
               $data = [
                   'name' => $firstname,
                   'surname' => $surname,
                   'age' => $age,
                   'email' => $email,
                   'password' => crypt($password),
               ];

               $user = new Users();
               $user->table='users';

               if($user->create($data)){

                   if($user->isLoggedIn()){
                       $this->redirect('user/profile');
                   }else{
                       $this->redirect('user/login');
                   }

               }
           }
           $msg = "Error Password";

        }
        if($user->isLoggedIn()){
            $this->render('adduser',['message'=>$msg]);
        }else{
            $this->render('register',['message'=>$msg]);
        }

    }

    public function profileAction()
    {
        $model = new Users();
        $prod = new Product();
        $prods = $prod->select()->get();
        if (!$model->isLoggedIn()) {
            $this->redirect('user/login');
        }
        $user_id = App::session()->get('user_id');
        $user = $model->select()->where(['id' => $user_id])->first();
        if ($user['role'] == 1) {
            $this->redirect('admin/admin');
        } else {
            $this->render('profile', [
                'user' => $user,
                'products' => $prods
            ]);
        }
    }

    public function logoutAction(){
        App::session()->destroy();
        $this->redirect('user/login');

    }


}



