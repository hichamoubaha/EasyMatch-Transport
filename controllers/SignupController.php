<?php

use App\core\Controller;
use App\Models\User;

class SignupController extends Controller
{

    public function index()
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