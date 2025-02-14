<?php

// use Controllers\TrajetController;
// Point d'entrée de l'application

define('ROOT_PATH', dirname(__DIR__));

require_once ROOT_PATH .'/controllers/TrajetController.php';

require_once ROOT_PATH. '/controllers/AuthController.php';

require_once ROOT_PATH . '/config/Database.php';
require_once ROOT_PATH . '/controllers/TripController.php';
require_once ROOT_PATH. '/controllers/DriverController.php';
require_once ROOT_PATH . '/controllers/TrajetController.php';

$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

$controller = new TripController();
$auth = new AuthController();
$driver = new DriverController();

$trajetController = new TrajetController();
try {
    switch ($action) {
        case 'show':
            if ($id) {
                $controller->show($id);
            } else {
                throw new Exception("ID non spécifié");
            }
            break;

































































         case 'createTraject':
            $trajetController->createTraject();
            break;
            case 'login' : $auth->Login();
            break;
            case 'showlogin' : $auth->viewLogin();
            break;
            case 'signup' : $auth->signup();
            break;
            case 'showsignup' : $auth->viewSignUp();
            break;
            case 'driver' : $trajetController->index();
            break;
    }
} catch (Exception $e) {
    echo "Une erreur est survenue : " . $e->getMessage();
}
