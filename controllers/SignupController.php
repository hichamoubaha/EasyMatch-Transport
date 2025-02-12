<?php
use App\Models\User;

class SignupController
{

    private function view($name, $data = []){
        
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

    
    public function index()
    {
        $data = [];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $user = new User;
            $errors = [];

            if($user->validate($_POST)){

                $user->insertUser($_POST);
                require '../views/Authentication/login.view.php';
            }

            $errors = $user->errors;
            $data['errors'] = $errors;

        }

        return $this->view('signup',$data);
        
    }
}