<?php
class Avis {
    private $conn;
    private $table = 'avis';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAllAvis() {
        $query = "SELECT a.*, e.nom AS expediteur_nom, c.nom AS conducteur_nom 
                  FROM " . $this->table . " a
                  LEFT JOIN users e ON a.expediteur = e.id
                  LEFT JOIN users c ON a.conducteur = c.id
                  ORDER BY a.id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>