<?php


class Controller{
    

    public function view($name, $data = []){
        echo 'hello';
        if(!empty($data))
            extract($data);

        $filename = '../app/views/'. $name .'.view.php';

        if(file_exists($filename)){
            require_once $filename;
        }
        else{

            $filename = '../app/views/404.view.php';
            require_once $filename;
        
        }
    }
}