<?php
class Database {

    private $host = "localhost";
    private $database = "koulia";
    private $username = "postgres";
    private $password = "moussi@25"; 
    private $conn = null;

    public function getConnection() {
        try {
            $this->conn = new PDO(
                "pgsql:host=" . $this->host . ";dbname=" . $this->database,
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch(PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage();
            return null;
        }
    }
}
?>