<?php
require_once 'models/Reservation.php';
require_once 'models/Trip.php';

class ReservationController {
    private $reservationModel;
    private $tripModel;

    public function __construct() {
        $db = (new Database())->getConnection();
        $this->reservationModel = new Reservation($db);
        $this->tripModel = new Trip($db);
    }

    public function addToCart($tripId) {
        session_start();
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Vérifier si le trajet n'est pas déjà dans le panier
        if (!in_array($tripId, $_SESSION['cart'])) {
            $_SESSION['cart'][] = $tripId;
            $_SESSION['success_message'] = "Trajet ajouté au panier avec succès!";
        } else {
            $_SESSION['error_message'] = "Ce trajet est déjà dans votre panier.";
        }

        header('Location: ?action=viewCart');
        exit;
    }

    public function viewCart() {
        session_start();
        $cartItems = [];
        
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $tripId) {
                $trip = $this->tripModel->getTripById($tripId);
                if ($trip) {
                    $cartItems[] = $trip;
                }
            }
        }

        require 'views/reservations/cart.php';
    }

    public function removeFromCart($tripId) {
        session_start();
        if (isset($_SESSION['cart'])) {
            $key = array_search($tripId, $_SESSION['cart']);
            if ($key !== false) {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']); // Réindexer le tableau
                $_SESSION['success_message'] = "Trajet retiré du panier.";
            }
        }
    }}