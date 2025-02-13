<?php
class Avis {
    private $message;
    private $note;
    private $db;


    public function __construct($message, $note, $db) {
        $this->message = $message;
        $this->note = $note;
        $this->db = $db;
    }


    public function getMessage() {
        return $this->message;
    }

    public function setMessage($message) {
        $this->message = $message;
    }

    public function getNote() {
        return $this->note;
    }

    public function setNote($note) {
        if (is_int($note) && $note >= 0 && $note <= 5) {
            $this->note = $note;
        } else {
            throw new Exception("note in less then or bigger then 5");
        }
    }

    // Function to send feedback to a user
    public function sendFeedback($sender, $receiver, $trajet) {
        try {
            $sql = "INSERT INTO avis (expediteur, destinataire, trajet, message, note) 
            VALUES (:sender, :receiver, :trajet, :message, :note)";
            $query = $this->db->prepare($sql);
            $query->bindParam(':sender', $sender, PDO::PARAM_INT);
            $query->bindParam(':receiver', $receiver, PDO::PARAM_INT);
            $query->bindParam(':trajet', $trajet, PDO::PARAM_INT);
            $query->bindParam(':message', $this->message, PDO::PARAM_STR);
            $query->bindParam(':note', $this->note, PDO::PARAM_INT);
            $query->execute();
        } catch (PDOException $error) {
            die("Error in sending feedback function : " . $error->getMessage());
        }
    }

    // Function to get received feedbacks of a user 
    public function getReceivedFeedBacks($user_id) {
        try {
            $sql = "SELECT * FROM avis WHERE destinataire = :user_id ORDER BY id DESC";
            $query = $this->db->prepare($sql);
            $query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $error) {
            die("Error getting received feedbacks function: " . $error->getMessage());
        }
    }

    // Function to get sended feedbacks of a user 
    public function getSendedFeedBacks($user_id) {
        try {
            $sql = "SELECT * FROM avis WHERE expediteur = :user_id ORDER BY id DESC";
            $query = $this->db->prepare($sql);
            $query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $error) {
            die("Error getting sended feedbacks duncrtion: " . $error->getMessage());
        }
    }
}
?>
