<?php
session_start();

require_once __DIR__.'/core/config.php';
require_once __DIR__."/../app/core/App.php";
require_once __DIR__."/../app/core/Controller.php";
require_once __DIR__."/../app/core/functions.php";

$app = new App;