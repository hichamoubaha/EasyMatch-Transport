<?php
require_once __DIR__."/Controller.php";

use Models\Driver;

class DriverController extends Controller
{
    public function index(){
    }

    public function getDriverAnnouncements($id){
        $driver = new Driver();
        $driver->setIdUser($id);
        $announcements = $driver->getDriverAnnonce();
        $this->view('driver', ['announcements' => $announcements]);
    }






}