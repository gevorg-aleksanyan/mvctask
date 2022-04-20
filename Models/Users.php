<?php

class Users extends Model
{

    public function isLoggedIn(){
        $user_id =  App::session()->get('user_id');
        if($user_id){
            return true;
        }
        return false;
    }

}