<?php
require_once __DIR__.'/../core/Controller.php';
use App\core\Model;
use App\Models\User;

class HomeController extends Controller
{
    public function index(){

        return $this->view('home\home');
    }
    
}