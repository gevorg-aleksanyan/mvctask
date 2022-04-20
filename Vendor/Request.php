<?php

class Request
{

    public function get($key = null){
        if($key){
            return $this->filter($_GET[$key]);
        }
        return $this->filterArray($_GET);

    }

    public function post($key = null){
        if($key){
            return $this->filter($_POST[$key]);
        }
        return $this->filterArray($_POST);
    }

    public function file($key = null){

        return $_FILES[$key];
    }

    public function filter($str){
        $clean_str = trim($str);
        $clean_str = addslashes($clean_str);
        $clean_str = stripslashes($clean_str);
        $clean_str = urldecode($clean_str);
        return $clean_str;
    }

    public function filterArray($arr){
        $vanish_arr = [];
        foreach ($arr as $key => $value){
            $vanish_arr[$this->filter($key)] = $this->filter($value);
        }
        return $vanish_arr;
    }



}