<?php
namespace App\Models;
use App\Config\Database;

class Driver extends User {
    private $license_number;
    private $vehicle_type;

    
    public function __construct($id_user = null, $first_name = null, $last_name = null, $email = null, 
        $password = null, $phone = null, $license_number = null, $vehicle_type = null) {
        
        parent::__construct($id_user, $first_name, $last_name, $email, $password, $phone);
        $this->license_number = $license_number;
        $this->vehicle_type = $vehicle_type;
    }

    // Getters
    public function getLicenseNumber() {
        return $this->license_number;
    }

    public function getVehicleType() {
        return $this->vehicle_type;
    }

    // Setters
    public function setLicenseNumber($license_number) {
        $this->license_number = $license_number;
    }

    public function setVehicleType($vehicle_type) {
        $this->vehicle_type = $vehicle_type;
    }

    public function getDriverAnnonce() {
        $database = new Database();
        $conn = $database->getConnection();
        $query = "SELECT * FROM trajet WHERE conducteur_id = :driver_id";
        $stmt = $conn->prepare($query);
        $stmt->execute(['driver_id' => $this->getIdUser()]);
        return $stmt->fetchAll();
    }
}