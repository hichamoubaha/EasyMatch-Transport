<?php

namespace App\Controllers;

use App\Models\Trajet;
use Exception;

class TrajetController {
    
    public function index() {
        require_once ROOT_PATH . '/views/DRIVER/RIDE.php';
    }

    public function createTraject() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (!empty($_POST)) {
                    echo "Données reçues avec succès !";

                  var_dump($_POST);
                }

                
            try {
                $requiredFields = ['driver_id', 'point_depart', 'point_arrivee', 'date_depart', 'date_darrivee', 'typedevehicule', 'capasitedevehicule', 'matriculeVehicule'];
                
                foreach ($requiredFields as $field) {
                    if (empty($_POST[$field])) {
                        throw new Exception("Le champ {$field} est requis.");
                    }
                }

                $driver_id = htmlspecialchars($_POST['driver_id']);
                $point_depart = htmlspecialchars($_POST['point_depart']);
                $point_arrivee = htmlspecialchars($_POST['point_arrivee']);
                $date_depart = htmlspecialchars($_POST['date_depart']);
                $date_darrivee = htmlspecialchars($_POST['date_darrivee']);
                $typedevehicule = htmlspecialchars($_POST['typedevehicule']);
                $capasitedevehicule = htmlspecialchars($_POST['capasitedevehicule']);
                $etapesintermediaires = isset($_POST['etapesintermédiaires']) ? htmlspecialchars($_POST['etapesintermédiaires']) : null;
                $matriculeVehicule = htmlspecialchars($_POST['matriculeVehicule']);

                $trajet = new Trajet();
                $trajet->setDriver_id($driver_id);
                $trajet->setPoint_Depart($point_depart);
                $trajet->setPoint_Arrivee($point_arrivee);
                $trajet->setDate_Depart($date_depart);
                $trajet->setDate_Darrivee($date_darrivee);
                $trajet->setTypedevehicule($typedevehicule);
                $trajet->setCapasitedevehicule($capasitedevehicule);
                $trajet->setEtapesintermédiaires($etapesintermediaires);
                $trajet->setMatriculeVehicule($matriculeVehicule);

                if ($trajet->AddRide()) {
                    header("Location: " . ROOT . "success-page");
                    exit();
                } else {
                    throw new Exception("Erreur lors de l'enregistrement du trajet.");
                }
            } catch (Exception $e) {
                $_SESSION['error'] = $e->getMessage();
               
                echo 'error';
                exit();
            }
        }
    }
}
?>