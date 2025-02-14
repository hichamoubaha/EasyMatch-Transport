<?php

class Trip {
    private $conn;
    private $table = 'trajet';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAllTrips() {
        $query = "SELECT t.*, u.nom as conducteur_nom, u.prenom as conducteur_prenom
                  FROM " . $this->table . " t
                  LEFT JOIN users u ON t.conducteur_id = u.id
                  ORDER BY t.date_offre DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function getTripById($id) {
        $query = "SELECT t.*, u.nom as conducteur_nom, u.prenom as conducteur_prenom
                  FROM " . $this->table . " t
                  LEFT JOIN users u ON t.conducteur_id = u.id
                  WHERE t.id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }
}