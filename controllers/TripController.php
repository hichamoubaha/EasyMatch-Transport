<?php
require_once ROOT_PATH . '/models/Trip.php';

use App\Models\Trip;
use App\Config\Database;
class TripController {
    private $tripModel;

    public function __construct() {
        $db = (new Database())->getConnection();
        $this->tripModel = new Trip($db);
    }

    public function index() {
        $trips = $this->tripModel->getAllTrips();
        require ROOT_PATH . '/views/trips/index.php';
    }

    public function show($id) {
        $trip = $this->tripModel->getTripById($id);
        if ($trip) {
            require ROOT_PATH . '/views/trips/show.php';
        } else {
            throw new Exception("Trajet non trouvé");
        }
    }
}