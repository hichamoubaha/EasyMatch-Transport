<?php

require_once __DIR__ . '/../config/Database.php';

class User
{

    private $id_user;
    private $nom;
    private $prenom;
    private $email;
    private $telephone;
    private $motdepass;
    private $date_naissance;
    private $role;
    public $errors = [];

    private $pdo;
    
    public function __construct()
    {
        $this->pdo = new Database();
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


    private function query($query,$data = []){
        
        $stmt = $this->pdo->getConnection()->prepare($query);
        $check = $stmt->execute($data);

        if($check){
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);

            if(is_array($result) && count($result)){
                return $result;
            }

        }
        else return false;

    }


    public function validate($data){

        if(isset($data['nom']) && isset($data['prenom']) && isset($data['post']) && isset($data['date_naissance'])){
            if(empty($data['nom'])){
                $this->errors['firstname'] = 'Nom est obligatoire !';
            }
    
            if(empty($data['prenom'])){
                $this->errors['lastname'] = 'Prenom est obligatoire !';
            }

            if(empty($data['post'])){
                $this->errors['post'] = 'role est obligatoire';
            }
    
            if(empty($data['date_naissance'])){
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
            $this->errors['password'] = 'Password est obligatoire !';
        }

        if(empty($this->errors)){
            return true;
        }

        return false;
    }


    public function insertUser($data){
        $keys = array_keys($data);
        $data['password'] = password_hash($data['password'],PASSWORD_BCRYPT);
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