<?php

class Controller{
    
    public function view($name, $data = []){
        
        if(!empty($data))
            extract($data);

        $filename = '../app/views/'. $name .'.view.php';

        if(file_exists($filename)){
            require_once $filename;
        }
        else{

            $filename = '../views/404.view.php';
            require_once $filename;
        
        }
    }
}