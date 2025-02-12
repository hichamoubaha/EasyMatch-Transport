<?php
<<<<<<< HEAD:app/controllers/HomeController.php
require_once __DIR__.'/../core/Controller.php';

use App\core\Controller;
=======
use App\Core\Controller;
>>>>>>> feca53b1604be2a15cf3b4676cc8c5726b0d3e2a:controllers/HomeController.php
use App\core\Model;
use App\Models\User;

class HomeController extends Controller
{
    public function index(){
        
        return $this->view('home');
    }
<<<<<<< HEAD:app/controllers/HomeController.php
=======

    
>>>>>>> feca53b1604be2a15cf3b4676cc8c5726b0d3e2a:controllers/HomeController.php
    
}