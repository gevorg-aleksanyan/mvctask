<?php

class Session
{
    protected static $instance = null;

    public function __construct(){
        session_start();
    }

    public static function get($key){
        return $_SESSION[$key];
    }

    public static function set($data){
        foreach ($data as $key => $value){
            $_SESSION[$key] = $value;
        }
    }

    public function destroy(){
        session_destroy();
    }


    public static function getInstance(){
        if(!self::$instance){
            self::$instance = new static();
        }
        return self::$instance;
    }

}