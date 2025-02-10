<?php

class App
{
    private $controller = 'HomeController';
    private $method     = 'index';

    private function splitURL()
    {
        $URL = $_GET['url'] ?? 'home';
        $URL = explode("/", filter_var(trim($URL,"/"),FILTER_SANITIZE_URL));
        return $URL;
    }

    public function __construct()
    {
        $URL = $this->splitURL();

        $filename = "../app/controllers/".ucfirst($URL[0])."Controller.php";
        if(file_exists($filename))
        {
            require $filename;
            $this->controller = ucfirst($URL[0]).'Controller';
            unset($URL[0]);
        }else{

            $filename = "../app/controllers/_404.php";
            require $filename;
            $this->controller = "_404";
        }

        $controller = new $this->controller;

        if(!empty($URL[1]))
        {
            if(method_exists($controller, $URL[1]))
            {
                $this->method = $URL[1];
                unset($URL[1]);
            }
        }

        call_user_func_array([$controller,$this->method], $URL);

    }

}