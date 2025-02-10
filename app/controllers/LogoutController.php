
<?php

class LogoutController extends Controller
{

    public function index(){

        unset($_SESSION);
        session_destroy();

        redirect('home');
    }
}