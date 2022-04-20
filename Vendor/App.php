<?php

require_once '../config/constants.php';

require_once VENDOR.'File.php';
require_once VENDOR.'Request.php';
require_once VENDOR.'Singleton.php';
require_once VENDOR.'Session.php';
require_once VENDOR.'Model.php';

class App
{

    public static $session;
    public static function start() {

        $uri = $_SERVER['REQUEST_URI'];
        $uriArray = explode('/', $uri);

        $controller = 'index';
        $action = 'index';

        if ($uriArray[1]) {
            $controller = $uriArray[1];
        }

        if ($uriArray[2]) {
            $action = $uriArray[2];
        }

        if (is_numeric($uriArray[3])) {
            $_GET['id'] = $uriArray[3];
        }

        for ($i=3;$i<count($uriArray);$i+=2 ){
            $_GET[$uriArray[$i]] = $uriArray[$i+1];

        }




        $controllerName = ucfirst($controller) . 'Controller';
        $controllerFileName = $controllerName . '.php';

        $actionName = $action . 'Action';

        if (file_exists(CONTROLLERS . $controllerFileName)) {
            require(VENDOR . '/Controller.php');
            require(CONTROLLERS . $controllerFileName);
            self::loadModels();
            Controller::$currentController = $controller;
            Controller::$currentAction = $action;
            if (class_exists($controllerName)) {
                $controllerObj = new $controllerName;

                if (method_exists($controllerName, $actionName)) {
                    $controllerObj->$actionName();
                } else {
                    throw new Exception(" $actionName function does not exist", 404);
                  }

            } else {
                throw new Exception("$controllerName class does not exist");
              }

        } else {
            throw new Exception("$controllerFileName file does not exist");
          }
    }

    public static function asset($url){

        return "/$url";
    }

    public static function loadModels(){
        $models = glob(MODELS.'*.php');
        foreach ($models as $model){
            require_once($model);
        }
    }

    public static function session(){

        return Session::getInstance();
    }

    public static function request(){
        return new Request();;
    }
    public static function file(){
        return new File();
    }
    public static function url($url,$params = []) {
        return self::asset($url);
    }



}