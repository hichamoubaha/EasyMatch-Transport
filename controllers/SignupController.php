<?php
require __DIR__.'/../models/User.php';

class SignupController extends Controller
{

    public function index(){
        require __DIR__.'/../views/Authentication/signup.view.php';
    }

    public function signup()
    {
        $data = [];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $user = new User;
            $errors = [];

            if($user->validate($_POST)){

                $user->insertUser($_POST);
                return $this->view('Authentication/login');
            }

            $errors = $user->errors;
            $data['errors'] = $errors;

        }

        return $this->view('Authentication/signup',$data);
        
    }
}