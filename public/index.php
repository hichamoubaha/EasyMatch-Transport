<?php

// Point d'entrée de l'application
define('ROOT_PATH', dirname(__DIR__));

require_once ROOT_PATH . '/config/Database.php';
require_once ROOT_PATH . '/controllers/TripController.php';
require_once ROOT_PATH. '/controllers/DriverController.php';
require_once ROOT_PATH. '/controllers/UserController.php';
require_once ROOT_PATH. '/controllers/LoginController.php';
require_once ROOT_PATH. '/controllers/SignupController.php';

$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

$controller = new TripController();
$login = new LoginController();
$signup = new SignupController();

try {
    switch ($action) {
        case 'show':
            if ($id) {
                $controller->show($id);
            } else {
                throw new Exception("ID non spécifié");
            }
            break;
        default:
            $controller->index();
            break;

        
        

        




































































    case 'login' : $login->Login(); 
    break;
    case 'showlogin' : $login->index();
    break;
    case 'signup' : $signup->signup();
    break;
    case 'showsignup' : $signup->index();
    break;
    
    }
} catch (Exception $e) {
    echo "Une erreur est survenue : " . $e->getMessage();
}