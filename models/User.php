<?php

// Fichier: models/User.php

class User {
    private $conn;
    private $table = 'users';

    public $id;
    public $nom;
    public $prenom;
    public $phone;
    public $email;
    public $password;
    public $date_naissance;
    public $post;
    public $matricule;
    public $pays;
    public $ville;
    public $statut;
    public $date_bloque;
    public $sexe;

    public function __construct() {
        $this->pdo = new Database;
    }

    public function getUserById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    /*public function create() {
        $query = "INSERT INTO " . $this->table . " 
                  (nom, prenom, phone, email, password, date_naissance, post, matricule, pays, ville, statut, sexe) 
                  VALUES 
                  (:nom, :prenom, :phone, :email, :password, :date_naissance, :post, :matricule, :pays, :ville, :statut, :sexe)";

        $stmt = $this->pdo->prepare($query);

        $this->nom = htmlspecialchars(strip_tags($this->nom));
        $this->prenom = htmlspecialchars(strip_tags($this->prenom));
        $this->phone = htmlspecialchars(strip_tags($this->phone));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->password = password_hash($this->password, PASSWORD_DEFAULT); // Hachage du mot de passe
        $this->post = htmlspecialchars(strip_tags($this->post));
        $this->matricule = htmlspecialchars(strip_tags($this->matricule));
        $this->pays = htmlspecialchars(strip_tags($this->pays));
        $this->ville = htmlspecialchars(strip_tags($this->ville));
        $this->statut = htmlspecialchars(strip_tags($this->statut));
        $this->sexe = htmlspecialchars(strip_tags($this->sexe));

        $stmt->bindParam(':nom', $this->nom);
        $stmt->bindParam(':prenom', $this->prenom);
        $stmt->bindParam(':phone', $this->phone);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':date_naissance', $this->date_naissance);
        $stmt->bindParam(':post', $this->post);
        $stmt->bindParam(':matricule', $this->matricule);
        $stmt->bindParam(':pays', $this->pays);
        $stmt->bindParam(':ville', $this->ville);
        $stmt->bindParam(':statut', $this->statut);
        $stmt->bindParam(':sexe', $this->sexe);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }*/

    public function update() {
        $query = "UPDATE " . $this->table . "
                  SET nom = :nom, prenom = :prenom, phone = :phone, email = :email, 
                      date_naissance = :date_naissance, post = :post, matricule = :matricule, 
                      pays = :pays, ville = :ville, statut = :statut, sexe = :sexe
                  WHERE id = :id";

        $stmt = $this->pdo->prepare($query);

        $this->nom = htmlspecialchars(strip_tags($this->nom));
        $this->prenom = htmlspecialchars(strip_tags($this->prenom));
        $this->phone = htmlspecialchars(strip_tags($this->phone));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->post = htmlspecialchars(strip_tags($this->post));
        $this->matricule = htmlspecialchars(strip_tags($this->matricule));
        $this->pays = htmlspecialchars(strip_tags($this->pays));
        $this->ville = htmlspecialchars(strip_tags($this->ville));
        $this->statut = htmlspecialchars(strip_tags($this->statut));
        $this->sexe = htmlspecialchars(strip_tags($this->sexe));

        $stmt->bindParam(':nom', $this->nom);
        $stmt->bindParam(':prenom', $this->prenom);
        $stmt->bindParam(':phone', $this->phone);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':date_naissance', $this->date_naissance);
        $stmt->bindParam(':post', $this->post);
        $stmt->bindParam(':matricule', $this->matricule);
        $stmt->bindParam(':pays', $this->pays);
        $stmt->bindParam(':ville', $this->ville);
        $stmt->bindParam(':statut', $this->statut);
        $stmt->bindParam(':sexe', $this->sexe);
        $stmt->bindParam(':id', $this->id);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";

        $stmt = $this->pdo->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(':id', $this->id);

        if($stmt->execute()) {
            return true;
        }
        return false;
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

    public function validate($data) {
        $errors = [];

        if(empty($data['nom'])) {
            $errors['nom'] = 'Le nom est requis !';
        }

        if(empty($data['prenom'])) {
            $errors['prenom'] = 'Le prénom est requis !';
        }

        if(empty($data['email'])) {
            $errors['email'] = 'L\'email est requis !';
        } elseif(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'L\'email est invalide !';
        }

        if(empty($data['password'])) {
            $errors['password'] = 'Le mot de passe est requis !';
        }

        if(empty($data['post']) || !in_array($data['post'], ['admin', 'expediteur', 'conducteur'])) {
            $errors['post'] = 'Le poste doit être admin, expediteur ou conducteur !';
        }

        if(empty($data['sexe']) || !in_array($data['sexe'], ['M', 'F'])) {
            $errors['sexe'] = 'Le sexe doit être M ou F !';
        }

        if(empty($data['statut']) || !in_array($data['statut'], ['accepted', 'blocked', 'pending'])) {
            $errors['statut'] = 'Le statut doit être accepted, blocked ou pending !';
        }

        return $errors;
    }

    public function insertUser($data){
        
        $keys = array_keys($data);
        $data['password'] = password_hash($data['password'],PASSWORD_BCRYPT);
        $query = "INSERT INTO public.users(". implode(",",$keys) .")" . " VALUES(:". implode(",:",$keys) .")";
        $this->query($query,$data);

    }


    protected function query($query,$data = []){

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
}
?>
