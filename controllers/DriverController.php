<?php
require_once __DIR__."/Controller.php";

class DriverController extends Controller
{
    public function index(){
        $this->view('driver');
    }
}