<?php

session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

<<<<<<< HEAD
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/Trip.php';
require_once __DIR__ . '/../controllers/TripController.php';
require_once __DIR__ . '/../controllers/AuthController.php';
require_once __DIR__ . '/../controllers/DriverController.php';
require_once  ROOT_PATH . '/controllers/TrajetController.php';
=======
require_once ROOT_PATH . '/config/Database.php';
require_once ROOT_PATH . '/controllers/TripController.php';
require_once ROOT_PATH. '/controllers/DriverController.php';
require_once ROOT_PATH. '/controllers/UserController.php';
require_once ROOT_PATH. '/controllers/AuthController.php';
require_once ROOT_PATH. '/controllers/AdminController.php';
require_once ROOT_PATH. '/controllers/AdminOfferController.php';
require_once ROOT_PATH. '/controllers/AdminAvisController.php';
require_once ROOT_PATH. '/controllers/TransactionController.php';
>>>>>>> origin/hicham

$database = new Database();
$db = $database->getConnection();

if (!$db) {
    die("Erreur de connexion à la base de données. Veuillez vérifier vos paramètres de configuration.");
}

$action = $_GET['action'] ?? ($_POST['action'] ?? 'index');
$tripId = $_GET['id'] ?? null;
$userId = $_GET['user_id'] ?? $_POST['user_id'] ?? 1;

$tripController = new TripController($db);
$auth = new AuthController;
$driver = new DriverController;
$trajetController = new TrajetController();

$trajetController = new TrajetController();
try {
    switch ($action) {
        case 'index':
        case 'showtrajet':
            $tripController->index($userId);
            break;
            
        case 'tripDetails':
            if (!$tripId) {
                throw new Exception("ID du trajet non spécifié");
            }
            $tripController->showTripDetails($tripId, $userId);
            break;
            
        case 'reserve':
            $tripController->reserveTrip($userId);
            break;
            
        case 'viewCart':
            $tripController->viewCart($userId);
            break;
            
        default:
            $tripController->index($userId);
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
    case 'showsignup' : $auth->viewSignUp();
    break;
    case 'driver' : $driver->index();
    break;
    case 'updatedemande' : $driver->index();
    break;
    case 'showride' : $trajetController->index();
    break;
    case 'createTraject' : $trajetController->createTraject();
    break;
    
    }
} catch (Exception $e) {
    $_SESSION['error_message'] = $e->getMessage();
    error_log("Erreur : " . $e->getMessage());
    header("Location: index.php?user_id=" . $userId);
    exit();
}
?>
