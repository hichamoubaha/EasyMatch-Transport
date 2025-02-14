<?php
namespace App\Models;

use PDO;
use Config\Database;

class User
{

    use Database;

    private $id_user;
    private $nom;
    private $prenom;
    private $email;
    private $telephone;
    private $motdepass;
    private $date_naissance;
    private $role;
    public $errors = [];

    public function __contruct($id_user,$nom,$prenom,$email,$telephone,$date_naissance,$role,$motdepass)
    {

        $this->id_user = $id_user;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->telephone = $telephone;
        $this->date_naissance = $date_naissance;
        $this->role = $role;
        $this->motdepass = $motdepass;
    }

    //getters and setters
    public function getIdUser(){
        return $this->id_user;
    }
    public function setIdUser($id_user){
        $this->id_user = $id_user;
    }

    public function getNom()
    {
        return $this->nom;
    }
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getTelephone()
    {
        return $this->telephone;
    }
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    public function getDateNaissance()
    {
        return $this->date_naissance;
    }
    public function setDateNaissance($date_naissance)
    {
        $this->date_naissance = $date_naissance;
    }

    public function getRole()
    {
        return $this->role;
    }
    public function setRole($role)
    {
        $this->role = $role;
    }

    public function getMotDePass(){
        return $this->motdepass;
    }
    public function setModDePass($motdepass){
        $this->motdepass = $motdepass;
    }



    public function validate($data){

        if(isset($data['nom']) && isset($data['prenom']) && isset($data['role']) && isset($data['date-naissance'])){
            if(empty($data['nom'])){
                $this->errors['firstname'] = 'First Name est obligatoire !';
            }
    
            if(empty($data['prenom'])){
                $this->errors['lastname'] = 'Last Name est obligatoire !';
            }

            if(empty($data['role'])){
                $this->errors['role'] = 'role est obligatoire';
            }
    
            if(empty($data['date-naissancec'])){
                $this->errors['date-naissance'] = 'date de naissance est invalid';
            }
        }

        if(empty($data['email'])){

            $this->errors['email'] = 'Email est obligatoire !';
           
        }
        else if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL)){

            $this->errors['email'] = 'Email est invalid !';
        }

        if(empty($data['password'])){
            $this->errors['password'] = 'Password is obligatoire !';
        }

        if(empty($this->errors)){
            return true;
        }

        return false;
    }

    public function insertUser($data){

        $keys = array_keys($data);

        $query = "INSERT INTO public.users(". implode(",",$keys) .")" . " VALUES(:". implode(",:",$keys) .")";

        $this->query($query,$data);

    }

    public function getUser($data , $data_not = []){

        $keys = array_keys($data);
        $keys_not = array_keys($data_not);

        $query = "SELECT * FROM public.users WHERE ";
        foreach($keys as $key){

            $query .= $key ." = :" .$key . " && ";
        }

        foreach($keys_not as $key){

            $query .= $key ." = :" .$key . " && ";
        }

        $query = rtrim($query, ' && ');

        $data = array_merge($data , $data_not);
        $result = $this->query($query ,$data);

        if($result) 
        return $result[0];

        return false;
    }

}