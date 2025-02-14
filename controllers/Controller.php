<?php

class Controller{
    
    protected function view($name, $data = []){
        
        if(!empty($data))
            extract($data);

        $filename = __DIR__.'/../views/'. $name .'.view.php';

        if(file_exists($filename)){
            require_once $filename;
        }
        else{

            $filename = __DIR__.'/../views/404.view.php';
            require_once $filename;
        
        }
    }
}