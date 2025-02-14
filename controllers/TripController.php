<?php
class TripController {
    private $tripModel;
    private $db;

    public function __construct($db) {
        $this->db = $db;
        $this->tripModel = new Trip($db);
    }

    public function index($userId) {
        try {
            $trips = $this->tripModel->getAllTrips();
            $cartCount = $this->tripModel->getCartCount($userId);
            require_once __DIR__ . '/../views/trips/index.php';
        } catch (Exception $e) {
            $_SESSION['error_message'] = "Erreur lors du chargement des trajets : " . $e->getMessage();
            require_once __DIR__ . '/../views/error.php';
        }
    }

    public function showTripDetails($tripId, $userId) {
        try {
            $trip = $this->tripModel->getTripById($tripId);
            $cartCount = $this->tripModel->getCartCount($userId);
            
            if (!$trip) {
                throw new Exception("Trajet non trouvé");
            }
            
            require_once __DIR__ . '/../views/trips/details.php';
        } catch (Exception $e) {
            $_SESSION['error_message'] = $e->getMessage();
            require_once __DIR__ . '/../views/error.php';
        }
    }

    public function reserveTrip($userId) {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: index.php?action=showtrajet&user_id=" . $userId);
            exit();
        }

        try {
            $tripId = filter_input(INPUT_POST, 'trip_id', FILTER_VALIDATE_INT);
            
            if (!$tripId) {
                throw new Exception("ID du trajet invalide");
            }

            $fragile = filter_input(INPUT_POST, 'fragile_admit', FILTER_SANITIZE_STRING);
            $nbrColierFragile = 0;
            $fragileDetails = [];
            
            // Traitement des colis normaux
            $colis = $_POST['colis'] ?? [];
            $sizeColier = '';
            foreach ($colis as $size => $quantity) {
                if ($quantity > 0) {
                    $sizeColier .= ($sizeColier ? ',' : '') . $quantity . $size;
                }
            }

            if (empty($sizeColier)) {
                throw new Exception("Veuillez sélectionner au moins un colis");
            }

            // Traitement des colis fragiles
            if ($fragile === 'oui') {
                $fragileColis = $_POST['fragile_colis'] ?? [];
                foreach ($fragileColis as $size => $quantity) {
                    $quantity = intval($quantity);
                    if ($quantity > 0) {
                        $nbrColierFragile += $quantity;
                        $fragileDetails[] = [
                            'size' => $size,
                            'quantity' => $quantity
                        ];
                    }
                }

                if ($nbrColierFragile === 0) {
                    throw new Exception("Veuillez sélectionner au moins un colis fragile");
                }
            }

            $reservationData = [
                'expediteur_id' => $userId,
                'id_projet' => $tripId,
                'fragile' => $fragile,
                'fragile_colier_reserve' => $nbrColierFragile,
                'size_colier' => $sizeColier,
                'nbr_colier_fragile' => $nbrColierFragile,
                'fragile_details' => $fragileDetails
            ];

            if ($this->tripModel->reserveTrip($reservationData)) {
                $_SESSION['success_message'] = "Réservation ajoutée au panier avec succès !";
                header("Location: index.php?action=viewCart&user_id=" . $userId);
                exit();
            }

        } catch (Exception $e) {
            $_SESSION['error_message'] = $e->getMessage();
            header("Location: index.php?action=tripDetails&id=" . $tripId . "&user_id=" . $userId);
            exit();
        }
    }
    public function viewCart($userId) {
        try {
            $reservations = $this->tripModel->getUserReservations($userId);
            $cartCount = $this->tripModel->getCartCount($userId);
            require_once __DIR__ . '/../views/trips/cart.php';
        } catch (Exception $e) {
            $_SESSION['error_message'] = "Erreur lors du chargement du panier : " . $e->getMessage();
            require_once __DIR__ . '/../views/error.php';
        }
    }
}
?>