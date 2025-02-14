<?php
require_once __DIR__ . "/../models/Trip.php";

class AdminOfferController extends Controller {
    private $tripModel;

    public function __construct() {
        $db = (new Database())->getConnection();
        $this->tripModel = new Trip($db);
    }

    public function index() {
        $offers = $this->tripModel->getAllOffers(); // Fetch all offers
        if ($offers === null) {
            $offers = []; // Initialize as an empty array if null
        }
        require __DIR__ . '/../views/admin/offers.view.php'; // Create this view
    }

    public function acceptOffer($id) {
        $this->tripModel->updateOfferStatus($id, 'accepted');
        redirect('admin/offers'); // Redirect to offers management page
    }

    public function refuseOffer($id) {
        $this->tripModel->updateOfferStatus($id, 'refused');
        redirect('admin/offers'); // Redirect to offers management page
    }
}
?>