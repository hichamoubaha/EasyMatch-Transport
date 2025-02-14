<?php
use App\Core\Controller;

class AboutController extends Controller

{
    public function index(){
        return $this->view('about');
    }
}                          