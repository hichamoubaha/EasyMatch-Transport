<?php
require __DIR__."/../models/User.php";

class Driver extends User
{



    public function updateDemandeStatus($data){

            $query = "UPDATE TABLE public.demande_expediteur SET status = :status";
            $this->query($query,$data);
    
    }

    public function getDemande(){
        
    }
}