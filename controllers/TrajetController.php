<?php

namespace App\Controllers;

use App\Models\Trajet;




class TrajetController
{

    public function createTraject($driver_id, $point_depart, $point_arrivee, $date_depart, $date_darrivee, $typedevehicule, $capasitedevehicule, $etapesintermédiaires, $matriculeVehicule)
    {

        $trajet = new Trajet($driver_id, $point_depart, $point_arrivee, $date_depart, $date_darrivee, $typedevehicule, $capasitedevehicule, $etapesintermédiaires, $matriculeVehicule);
 
        var_dump($trajet);
        $trajet = $trajet->AddTrajet($driver_id, $point_depart, $point_arrivee, $date_depart, $date_darrivee, $typedevehicule, $capasitedevehicule, $etapesintermédiaires, $matriculeVehicule);

        echo "Trajet ajouté avec succès";
    }
}