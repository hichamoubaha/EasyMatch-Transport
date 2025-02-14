<?php
session_start();
// Point d'entrée de l'application
define('ROOT_PATH', dirname(__DIR__));

require_once ROOT_PATH . '/config/Database.php';
require_once ROOT_PATH . '/controllers/TripController.php';
require_once ROOT_PATH. '/controllers/DriverController.php';
require_once ROOT_PATH. '/controllers/UserController.php';
require_once ROOT_PATH. '/controllers/AuthController.php';
require_once ROOT_PATH. '/controllers/AdminController.php';
require_once ROOT_PATH. '/controllers/AdminOfferController.php';
require_once ROOT_PATH. '/controllers/AdminAvisController.php';
require_once ROOT_PATH. '/controllers/TransactionController.php';

$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

$controller = new TripController();
$auth = new AuthController();

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
            // Add these cases in the switch statement
case 'admin/dashboard':
    $adminController = new AdminController();
    $adminController->index();
    break;
case 'admin/validate':
    $adminController->validateUser ($id);
    break;
case 'admin/suspend':
    $adminController->suspendUser ($id);
    break;
    case 'admin/offers':
        $adminOfferController = new AdminOfferController();
        $adminOfferController->index();
        break;
    case 'admin/accept':
        $adminOfferController->acceptOffer($id);
        break;
    case 'admin/refuse':
        $adminOfferController->refuseOffer($id);
        break;
        case 'admin/transactions':
            $transactionController = new TransactionController();
            $transactionController->index();
            break;
            case 'admin/avis':
                $adminAvisController = new AdminAvisController();
                $adminAvisController->index();
                break;
                case 'admin/statistics':
                    $adminController = new AdminController();
                    $statistics = $adminController->getStatistics();
                    require ROOT_PATH . '/views/admin/statistics.view.php';
                    break;

        
        

        




































































    case 'login' : $auth->Login(); 
    break;
    case 'showlogin' : $auth->viewLogin();
    break;
    case 'signup' : $auth->signup();
    break;
    case 'logout' : $auth->logout();
    break;
    case 'showsignup' : $auth->viewSignUp();
    break;
    case 'driver' : $driver->index();
    break;
    case 'updatedemande' : $driver->index();
    break;
    
    }
} catch (Exception $e) {
    echo "Une erreur est survenue : " . $e->getMessage();
}