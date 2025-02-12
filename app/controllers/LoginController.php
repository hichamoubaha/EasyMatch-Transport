<?php

use App\core\Controller;
use App\Models\User;

class LoginController extends Controller
{

    public function index()
    {
        $data = [];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $user = new User;
            $errors = [];

            if($user->validate($_POST)){

                $data['email'] = $_POST['email'];

                $dbuser = $user->first($data);
                if($dbuser){
                    if ($dbuser->password === $_POST['password']){

                        $_SESSION['USER'] = $dbuser;
                        redirect('home');
        
                    }
                }
            }

            $errors = $user->errors;
            $data['errors'] = $errors;

        }

        return $this->view('login',$data);
        
    }

}