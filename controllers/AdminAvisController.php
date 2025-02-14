<?php
require_once __DIR__ . "/../models/Avis.php";

class AdminAvisController extends Controller {
    private $avisModel;

    public function __construct() {
        $db = (new Database())->getConnection();
        $this->avisModel = new Avis($db);
    }

    public function index() {
        $avis = $this->avisModel->getAllAvis(); // Fetch all avis
        require __DIR__ . '/../views/admin/avis.view.php'; // Create this view
    }
}
?>