<?php

class UserController {
    private $userModel;
    private $tripModel;

    public function __construct($db) {
        $this->userModel = new User($db);
        $this->tripModel = new Trip($db);
    }

    public function showUserInfo($userId) {
        $user = $this->userModel->getUserById($userId);
        $trips = $this->tripModel->getTripsByUserId($userId);

        if ($user) {
            $salutation = $user['sexe'] == 'F' ? 'Madame' : 'Monsieur';
            echo "<h1>Bonjour $salutation " . htmlspecialchars($user['prenom'] . ' ' . $user['nom']) . "</h1>";
            
            echo "<h2>Vos trajets :</h2>";
            if ($trips && count($trips) > 0) {
                echo "<ul>";
                foreach ($trips as $trip) {
                    echo "<li>De " . htmlspecialchars($trip['point_depart']) . " à " . htmlspecialchars($trip['point_destination']) . " (Date: " . htmlspecialchars($trip['date_offre']) . ")</li>";
                }
                echo "</ul>";
            } else {
                echo "<p>Aucun trajet trouvé.</p>";
            }
        } else {
            echo "Utilisateur non trouvé.";
        }
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nom' => $_POST['nom'] ?? '',
                'prenom' => $_POST['prenom'] ?? '',
                'email' => $_POST['email'] ?? '',
                'telephone' => $_POST['telephone'] ?? '',
                'motdepass' => $_POST['motdepass'] ?? '',
                'sexe' => $_POST['sexe'] ?? ''
            ];

            $errors = $this->userModel->validate($data);

            if (empty($errors)) {
                $this->userModel->nom = $data['nom'];
                $this->userModel->prenom = $data['prenom'];
                $this->userModel->email = $data['email'];
                $this->userModel->telephone = $data['telephone'];
                $this->userModel->motdepass = password_hash($data['motdepass'], PASSWORD_DEFAULT);
                $this->userModel->sexe = $data['sexe'];

                if ($this->userModel->create()) {
                    echo "Utilisateur créé avec succès.";
                } else {
                    echo "Une erreur est survenue lors de la création de l'utilisateur.";
                }
            } else {
                foreach ($errors as $error) {
                    echo $error . "<br>";
                }
            }
        } else {
            // Afficher le formulaire d'inscription
            include(VIEW_PATH . 'users/register.php');
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            // Vérification de l'utilisateur (à implémenter dans le modèle User)
            $user = $this->userModel->getUserByEmail($email);

            if ($user && password_verify($password, $user['motdepass'])) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['prenom'] . ' ' . $user['nom'];

                echo "Connexion réussie. Bienvenue, " . htmlspecialchars($_SESSION['user_name']) . "!";
            } else {
                echo "Email ou mot de passe incorrect.";
            }
        } else {
            // Afficher le formulaire de connexion
            include(VIEW_PATH . 'users/login.php');
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        echo "Vous avez été déconnecté.";
        // Rediriger vers la page d'accueil ou de connexion
    }
}