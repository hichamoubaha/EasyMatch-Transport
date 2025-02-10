<?php
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

                $user->insert($_POST);
                redirect('login');
            }

            $errors = $user->errors;
            $data['errors'] = $errors;

        }

        return $this->view('signup',$data);
        
    }
}