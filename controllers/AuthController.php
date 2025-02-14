<?php

class AuhtController extends Controller
{

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
                    if ($dbuser->password === $_POST['password']){

                        $_SESSION['USER'] = $dbuser;
                        
                        if($dbuser->role === 'expediteur'){
                            redirect('sender');
                        }
                        else if($dbuser->role === 'conducteur'){
                            redirect('driver');
                        }

                        else if($dbuser->role === 'admin'){
                            redirect('dashboard');
                        }
        
                    }
                }
            }

            $errors = $user->errors;
            $data['errors'] = $errors;

        }

        return $this->view('Authentication/login',$data);
        
    }
}