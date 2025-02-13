<?php

namespace App\Models;

use App\Config\Database;



class Trajet {

private $driver_id;

private $point_depart;

private $point_arrivee;

private $date_depart;

private $date_darrivee;

private $typedevehicule;

private $capasitedevehicule;

private $etapesintermédiaires;

private $matriculeVehicule;


public function __construct($driver_id, $point_depart, $point_arrivee, $date_depart, $date_darrivee, $typedevehicule, $capasitedevehicule, $etapesintermédiaires ,$matriculeVehicule) {
$this->driver_id = $driver_id;
$this->point_depart = $point_depart;
$this->point_arrivee = $point_arrivee;
$this->date_depart = $date_depart;
$this->date_darrivee = $date_darrivee;
$this->typedevehicule = $typedevehicule;
$this->capasitedevehicule = $capasitedevehicule;
$this->etapesintermédiaires = $etapesintermédiaires;
$this->matriculeVehicule = $matriculeVehicule;
}

public function getDriver_id() {
return $this->driver_id;
}

public function getPoint_depart() {
return $this->point_depart;

}

public function getPoint_arrivee() {
return $this->point_arrivee;
}

public function getDate_depart() {
return $this->date_depart;
}

public function getDate_darrivee() {
return $this->date_darrivee;
}

public function getTypedevehicule() {
return $this->typedevehicule;
}
public function getCapasitedevehicule() {
return $this->capasitedevehicule;
}
public function getEtapesintermédiaires() {
return $this->etapesintermédiaires;
}

public function setPoint_depart($point_depart) {
$this->point_depart = $point_depart;
}

public function setPoint_arrivee($point_arrivee) {
$this->point_arrivee = $point_arrivee;
}
public function setDate_depart($date_depart) {
$this->date_depart = $date_depart;
}
public function setDate_darrivee($date_darrivee) {
$this->date_darrivee = $date_darrivee;
}
public function setTypedevehicule($typedevehicule) {   
$this->typedevehicule = $typedevehicule;
}
public function setCapasitedevehicule($capasitedevehicule) {
$this->capasitedevehicule = $capasitedevehicule;
}
public function setEtapesintermédiaires($etapesintermédiaires) {
$this->etapesintermédiaires = $etapesintermédiaires;
}

public function getMatriculeVehicule() {
return $this->matriculeVehicule;
}

public function setMatriculeVehicule($matriculeVehicule) {
$this->matriculeVehicule = $matriculeVehicule;
}


public function AddTrajet($driver_id, $point_depart, $point_arrivee, $date_depart, $date_darrivee, $typedevehicule, $capasitedevehicule, $etapesintermédiaires) {

$database = new Database();
$conn = $database->getConnection();
$sql = "INSERT INTO trajet (driver_id, point_depart, point_arrivee, date_depart, date_darrivee, typedevehicule, capasitedevehicule, etapesintermédiaires) VALUES (:driver_id, :point_depart, :point_arrivee, :date_depart, :date_darrivee, :typedevehicule, :capasitedevehicule, :etapesintermédiaires)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':driver_id', $driver_id);
$stmt->bindParam(':point_depart', $point_depart);
$stmt->bindParam(':point_arrivee', $point_arrivee);
$stmt->bindParam(':date_depart', $date_depart);
$stmt->bindParam(':date_darrivee', $date_darrivee);
$stmt->bindParam(':typedevehicule', $typedevehicule);
$stmt->bindParam(':capasitedevehicule', $capasitedevehicule);
$stmt->bindParam(':etapesintermédiaires', $etapesintermédiaires);
$stmt->execute();
}

}