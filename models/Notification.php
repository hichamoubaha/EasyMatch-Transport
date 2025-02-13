<?php
class Notification {
    private $contenu;
    private $date;
    private $db;

    // Constructor
    public function __construct($contenu, $date, $db) {
        $this->contenu = $contenu;
        $this->date = $date;
        $this->db = $db;
    }

    // Getters
    public function getContenu() {
        return $this->contenu;
    }

    public function getDate() {
        return $this->date;
    }

    // Setters
    public function setContenu($contenu) {
        $this->contenu = $contenu;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    // Function to send notification to a user 

    public function sendNotification($recepteur) {
        try {
            $sql = "INSERT INTO notification (recepteur, contenu, date) VALUES (:recepteur, :contenu, :date)";
            $query = $this->db->prepare($sql);
            $query->bindParam(':recepteur', $recepteur, PDO::PARAM_INT);
            $query->bindParam(':contenu', $this->contenu, PDO::PARAM_STR);
            $query->bindParam(':date', $this->date, PDO::PARAM_STR);
            $query->execute();
        } catch (PDOException $error) { 
            die("Error sending notification: " . $error->getMessage());
        }
    }

    // Function to get user notifications by id 

    public function getUserNotifications($userId) {
        try {
            $sql = "SELECT * FROM notification WHERE recepteur = :userId ORDER BY date DESC";
            $query = $this->db->prepare($sql);
            $query->bindParam(':userId', $userId, PDO::PARAM_INT);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $error) {
            die("Error retrieving user notifications: " . $error->getMessage());
        }
    }
}
?>
