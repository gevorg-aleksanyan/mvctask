<?php

abstract class Controller {
    protected $layout =  'profile';
    public static $currentController;
    public static $currentAction;

    protected function render($view, $params = []) {
        ob_start();

        $this->renderPartial($view, $params);
        $content = ob_get_clean();

        if(file_exists(LAYOUTS.$this->layout.'.php')){
            include (LAYOUTS.$this->layout.'.php');
        } else {
            throw new Exception($this->layout.'.php'." layout does not exist");
        }
    }

    protected function renderPartial($view, $params = []) {
        extract($params);

        $viewArray = explode('/', $view);
        $class = get_class($this);
        $className = explode('Controller', $class);
        $viewFile = VIEWS.$view.'.php';

        if(count($viewArray) == 1){
            $viewFile = VIEWS.Controller::$currentController.DIRECTORY_SEPARATOR.$view.'.php';
        }
        if(file_exists($viewFile)){
            include($viewFile);
        } else {
            throw new Exception($view.'.php'." file does not exist");
        }
    }

    protected function redirect($url) {
        header("Location:/$url");
    }

}