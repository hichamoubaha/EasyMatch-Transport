<?php
// Définir les chemins
define('ROOT_PATH', dirname(__DIR__));

// Inclure les fichiers nécessaires
require_once ROOT_PATH . '/config/Database.php';
require_once ROOT_PATH . '/controllers/TripController.php';

// Gérer les erreurs
error_reporting(E_ALL);
ini_set('display_errors', 1);

try {
    $controller = new TripController();
    
    $action = isset($_GET['action']) ? $_GET['action'] : 'index';
    $id = isset($_GET['id']) ? $_GET['id'] : null;

    switch($action) {
        case 'show':
            if($id) {
                $controller->show($id);
            } else {
                throw new Exception("ID non spécifié");
            }
            break;
        default:
            $controller->index();
            break;
    }
} catch (Exception $e) {
    echo "Une erreur est survenue : " . $e->getMessage();
}
?>