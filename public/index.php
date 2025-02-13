<?php


use App\Controllers\TrajetController;
// Point d'entrée de l'application
define('ROOT_PATH', dirname(__DIR__));


require_once ROOT_PATH . '/config/Database.php';
require_once ROOT_PATH . '/controllers/TripController.php';
require_once ROOT_PATH. '/controllers/DriverController.php';
require_once ROOT_PATH. '/controllers/UserController.php';
require_once ROOT_PATH. '/controllers/LoginController.php';
require_once ROOT_PATH . '/controllers/TrajetController.php';

$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

$controller = new TripController();
$login = new LoginController;

$trajetController = new TrajetController();
try {
    switch ($action) {
        case 'show':
            if ($id) {
                $controller->show($id);
            } else {
                throw new Exception("ID non spécifié");
            }

        case 'createTraject':
            $trajetController->createTraject($_POST['driver_id'], $_POST['point_depart'], $_POST['point_arrivee'], $_POST['date_depart'], $_POST['date_darrivee'], $_POST['typedevehicule'], $_POST['capasitedevehicule'], $_POST['etapesintermédiaires'] , $_POST['matriculeVehicule']);
            break;
            case 'login' : $login->Login(); 

        default:
            $controller->index();
            break;

    }
} catch (Exception $e) {
    echo "Une erreur est survenue : " . $e->getMessage();
}