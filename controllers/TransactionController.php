<?php
require_once __DIR__ . "/../models/Trip.php";
require_once __DIR__ . "/../models/User.php";
require_once __DIR__ . "/../models/DemandeExpediteur.php";

class TransactionController extends Controller {
    private $tripModel;
    private $userModel;
    private $demandeModel;

    public function __construct() {
        $db = (new Database())->getConnection();
        $this->tripModel = new Trip($db);
        $this->userModel = new User($db);
        $this->demandeModel = new DemandeExpediteur($db);
    }

    public function index() {
        // Fetch all trips and their statuses
        $trips = $this->tripModel->getAllTrips(); // Ensure this returns an array
        
        // Fetch all demandes
        $demandes = $this->demandeModel->getAllDemandes(); // Ensure this returns an array
        
        // Pass both trips and demandes to the view
        require __DIR__ . '/../views/admin/transactions.view.php';
    }
}
?>