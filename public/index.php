<?php
// Point d'entrée de l'application
define('ROOT_PATH', dirname(__DIR__));

require_once ROOT_PATH . '/config/Database.php';
require_once ROOT_PATH . '/controllers/TripController.php';

$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

$controller = new TripController();

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
    }
} catch (Exception $e) {
    echo "Une erreur est survenue : " . $e->getMessage();
}