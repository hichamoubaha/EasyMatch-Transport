<?php
namespace App\Models;

use PDO;
use App\core\Database;
use App\core\Model;
use IModelRepositorie;

class User
{
    use Model;

    protected $table = 'users';
    private $id_user;
    private $nom;
    private $prenom;
    private $email;
    private $telephone;
    private $motdepass;

    public function __contruct($id_user,$nom,$prenom,$email,$telephone,$motdepass)
    {

        $this->id_user = $id_user;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->telephone = $telephone;
        $this->motdepass = $motdepass;
        $this->order_column = 'id_user';
    }

    //getters and setters
    public function getIdUser($id_user){
        return $this->id_user = $id_user;
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

    public function getMotDePass(){
        return $this->motdepass;
    }
    public function setModDePass($motdepass){
        $this->motdepass = $motdepass;
    }

    public function validate($data){

        if(isset($data['firstname']) && isset($data['lastname'])){
            if(empty($data['firstname'])){
                $this->errors['firstname'] = 'First Name is required !';
            }
    
            if(empty($data['lastname'])){
                $this->errors['lastname'] = 'Last Name is required !';
            }
        }

        if(empty($data['email'])){

            $this->errors['email'] = 'Email is required !';
           
        }
        else if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL)){

            $this->errors['email'] = 'Email is invalid !';
        }

        if(empty($data['password'])){
            $this->errors['password'] = 'Password is required !';
        }

        if(empty($this->errors)){

            return true;
        }

        return false;
    }

}