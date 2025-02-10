<?php
require_once '../app/core/Controller.php';

class _404 extends Controller{

    public function index()
    {
        return $this->view('404.view');
    }
}