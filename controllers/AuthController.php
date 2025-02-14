<?php
require __DIR__."/../models/User.php";
require __DIR__."/../function/functions.php";

class AuthController extends Controller
{

    public function viewLogin()
    {
        return$this->view('Authentication/login');
    }

    public function viewSignUp(){
        return$this->view('Authentication/signup');
    }


    public function login()
    {
        $data = [];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $user = new User;
            $errors = [];

            if($user->validate($_POST)){

                $data['email'] = $_POST['email'];

                $dbuser = $user->getUser($data);
                if($dbuser){
                    if (password_verify($_POST['password'],$dbuser->password)){

                        $_SESSION['USER'] = $dbuser;
                        
                        // if($dbuser->post === 'expediteur'){
                        //     redirect('sender');
                        // }
                        // else if($dbuser->post === 'conducteur'){
                        //     redirect('driver');
                        // }

                        // else if($dbuser->post === 'admin'){
                        //     redirect('dashboard');
                        // }
        
                    }
                }
            }

            $errors = $user->errors;
            $data['errors'] = $errors;

        }

        return $this->view('Authentication/login',$data);
        
    }

    public function signup()
    {
        $data = [];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $user = new User;
            $errors = [];

            if($user->validate($_POST)){
                unset($_POST['confirm_password']);
                $user->insertUser($_POST);
                return $this->view('Authentication/login');
            }

            $errors = $user->errors;
            $data['errors'] = $errors;

        }

        return $this->view('Authentication/signup',$data);
        
    }

    public function logout(){
        unset($_SESSION);
        session_destroy();

        redirect('home');
    }
}