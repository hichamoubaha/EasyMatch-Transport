<?php
class DemandeExpediteur {
    private $conn;
    private $table = 'demande_expediteur';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAllDemandes() {
        $query = "SELECT d.*, u.nom as expediteur_nom, u.prenom as expediteur_prenom
                  FROM " . $this->table . " d
                  LEFT JOIN users u ON d.expediteur_id = u.id
                  ORDER BY d.date_reservation DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}