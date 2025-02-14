<?php
require_once __DIR__ . "/Controller.php";
require_once __DIR__ . "/../models/User.php";

class AdminController extends Controller
{
    private $userModel;

    public function __construct() {
        $db = (new Database())->getConnection();
        $this->userModel = new User($db);
    }

    public function index() {
        $users = $this->userModel->getAllUsers(); // Fetch all users
        if ($users === null) {
            $users = []; // Initialize as an empty array if null
        }
        require __DIR__ . '/../views/admin/dashboard.view.php'; // Create this view
    }

    public function validateUser ($id) {
        $this->userModel->updateUser Status($id, 'accepted'); // Method to update user status
        redirect('admin/dashboard'); // Redirect to dashboard
    }

    public function suspendUser ($id) {
        $this->userModel->updateUser Status($id, 'blocked'); // Method to update user status
        redirect('admin/dashboard'); // Redirect to dashboard
    }
    public function getStatistics() {
        $db = (new Database())->getConnection();
        
        // Fetch number of published ads
        $stmt1 = $db->prepare("SELECT COUNT(*) as total_ads FROM trajet WHERE statut = 'accepted'");
        $stmt1->execute();
        $totalAds = $stmt1->fetchColumn();
    
        // Fetch number of requests sent
        $stmt2 = $db->prepare("SELECT COUNT(*) as total_requests FROM demande_expediteur");
        $stmt2->execute();
        $totalRequests = $stmt2->fetchColumn();
    
        // Fetch number of successful transactions
        $stmt3 = $db->prepare("SELECT COUNT(*) as total_successful_transactions FROM trajet WHERE statut = 'accepted'");
        $stmt3->execute();
        $totalSuccessfulTransactions = $stmt3->fetchColumn();
    
        return [
            'total_ads' => $totalAds,
            'total_requests' => $totalRequests,
            'total_successful_transactions' => $totalSuccessfulTransactions
        ];
    }
}
?>