<?php
class Trip {
    private $conn;
    private $table = 'trajet';
    private $reservationTable = 'reservation';
    private $fragileTable = 'fragile_colier_reserve';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAllTrips() {
        if (!$this->conn) {
            throw new Exception("La connexion à la base de données n'est pas établie.");
        }
        
        $query = 'SELECT 
                    t.*,
                    u.nom as conducteur_nom,
                    u.prenom as conducteur_prenom
                FROM ' . $this->table . ' t
                LEFT JOIN users u ON t.conducteur_id = u.id
                ORDER BY t.date_offre DESC';

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function getTripById($tripId) {
        if (!$this->conn) {
            throw new Exception("La connexion à la base de données n'est pas établie.");
        }
        
        $query = 'SELECT 
                    t.*,
                    u.nom as conducteur_nom,
                    u.prenom as conducteur_prenom
                FROM ' . $this->table . ' t
                LEFT JOIN users u ON t.conducteur_id = u.id
                WHERE t.id = :id
                LIMIT 1';

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $tripId);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getCartCount($userId) {
        try {
            $query = "SELECT COUNT(*) as count FROM " . $this->reservationTable . " WHERE expediteur_id = :userId";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':userId', $userId);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['count'];
        } catch(PDOException $e) {
            error_log("Erreur dans getCartCount: " . $e->getMessage());
            return 0;
        }
    }

    public function reserveTrip($data) {
        try {
            $this->conn->beginTransaction();

            // Insertion dans la table reservation
            $query = "INSERT INTO " . $this->reservationTable . " 
                    (expediteur_id, id_projet, fragile, fragile_colier_reserve, 
                     size_colier, nbr_colier_fragile, date_reservation) 
                    VALUES 
                    (:expediteur_id, :id_projet, :fragile, :fragile_colier_reserve, 
                     :size_colier, :nbr_colier_fragile, CURRENT_TIMESTAMP)
                    RETURNING id";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':expediteur_id', $data['expediteur_id']);
            $stmt->bindParam(':id_projet', $data['id_projet']);
            $stmt->bindParam(':fragile', $data['fragile']);
            $stmt->bindParam(':fragile_colier_reserve', $data['fragile_colier_reserve']);
            $stmt->bindParam(':size_colier', $data['size_colier']);
            $stmt->bindParam(':nbr_colier_fragile', $data['nbr_colier_fragile']);

            $stmt->execute();
            $reservationId = $stmt->fetch(PDO::FETCH_ASSOC)['id'];

            // Si des colis fragiles sont présents, les insérer dans la table fragile_colier_reserve
            if ($data['fragile'] === 'oui' && !empty($data['fragile_details'])) {
                $fragileQuery = "INSERT INTO " . $this->fragileTable . "
                               (demande_id, size_colier, nbr_colier_fragile)
                               VALUES
                               (:demande_id, :size_colier, :nbr_colier_fragile)";

                $fragileStmt = $this->conn->prepare($fragileQuery);

                foreach ($data['fragile_details'] as $detail) {
                    if ($detail['quantity'] > 0) {
                        $fragileStmt->bindParam(':demande_id', $reservationId);
                        $fragileStmt->bindParam(':size_colier', $detail['size']);
                        $fragileStmt->bindParam(':nbr_colier_fragile', $detail['quantity']);
                        $fragileStmt->execute();
                    }
                }
            }

            $this->conn->commit();
            return true;

        } catch(PDOException $e) {
            $this->conn->rollBack();
            error_log("Erreur dans reserveTrip: " . $e->getMessage());
            throw new Exception("Erreur lors de la réservation: " . $e->getMessage());
        }
    }

    public function getUserReservations($userId) {
        $query = "SELECT r.*, t.point_depart, t.point_destination 
                 FROM " . $this->reservationTable . " r
                 LEFT JOIN " . $this->table . " t ON r.id_projet = t.id
                 WHERE r.expediteur_id = :userId
                 ORDER BY r.date_reservation DESC";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getFragileDetails($reservationId) {
        $query = "SELECT * FROM " . $this->fragileTable . "
                 WHERE demande_id = :demande_id
                 ORDER BY id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':demande_id', $reservationId);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>