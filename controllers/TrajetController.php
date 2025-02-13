<?php


use App\Models\trajet;


class TrajetController {

public function createTraject($driver_id, $point_depart, $point_arrivee, $date_depart, $date_darrivee, $typedevehicule, $capasitedevehicule, $etapesintermédiaires) {

$trajet = new trajet($driver_id, $point_depart, $point_arrivee, $date_depart, $date_darrivee, $typedevehicule, $capasitedevehicule, $etapesintermédiaires);

$trajet = $trajet->AddTrajet($driver_id, $point_depart, $point_arrivee, $date_depart, $date_darrivee, $typedevehicule, $capasitedevehicule, $etapesintermédiaires);

}
}