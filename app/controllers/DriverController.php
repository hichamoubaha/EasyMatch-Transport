<?php
use App\core\Controller;

class DriverController extends Controller
{
    public function index(){
        $this->view('driver');
    }
}