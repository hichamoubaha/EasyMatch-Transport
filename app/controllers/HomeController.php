<?php
use App\Core\Controller;
use App\core\Model;
use App\Models\User;

class HomeController extends Controller
{
    public function index(){
        
        return $this->view('home');
    }

    
    
}