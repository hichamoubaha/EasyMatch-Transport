<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Panier - EasyMatch Transport</title>
    <link rel="stylesheet" href="/Projet_sprint_2/EasyMatch-Transport/public/css/style.css">
</head>
<body>
    <div class="container">
        <div class="header-with-cart">
            <h1>Mon Panier</h1>
            <a href="index.php?action=showtrajet&user_id=<?php echo htmlspecialchars($userId); ?>" class="btn-back">
                Retour aux trajets
            </a>
        </div>

        <?php if (isset($_SESSION['success_message'])): ?>
            <div class="alert alert-success">
                <?php 
                echo htmlspecialchars($_SESSION['success_message']);
                unset($_SESSION['success_message']);
                ?>
            </div>
        <?php endif; ?>

        <?php if (empty($reservations)): ?>
            <div class="empty-cart">
                <p>Votre panier est vide.</p>
            </div>
        <?php else: ?>
            <div class="reservations-list">
                <?php foreach ($reservations as $reservation): ?>
                    <div class="reservation-card <?php echo $reservation['statut']; ?>">
                        <div class="reservation-header">
                            <div class="reservation-header-left">
                                <h3>Réservation #<?php echo htmlspecialchars($reservation['id']); ?></h3>
                                <span class="status-badge <?php echo $reservation['statut']; ?>">
                                    <?php echo $reservation['statut'] === 'en_attente' ? 'En attente' : 'Acceptée'; ?>
                                </span>
                            </div>
                            <span class="reservation-date">
                                <?php echo date('d/m/Y H:i', strtotime($reservation['date_reservation'])); ?>
                            </span>
                        </div>
                        <div class="reservation-details">
                            <div class="driver-info">
                                <div class="avatar">
                                    <?php echo strtoupper(substr($reservation['conducteur_prenom'], 0, 1)); ?>
                                </div>
                                <div class="driver-details">
                                    <p class="driver-name">
                                        <?php echo htmlspecialchars($reservation['conducteur_prenom'] . ' ' . $reservation['conducteur_nom']); ?>
                                    </p>
                                </div>
                            </div>

                            <div class="trip-route">
                                <p>
                                    <strong>De:</strong> 
                                    <?php echo htmlspecialchars($reservation['point_depart']); ?>
                                </p>
                                <p>
                                    <strong>À:</strong> 
                                    <?php echo htmlspecialchars($reservation['point_destination']); ?>
                                </p>
                            </div>

                            <div class="package-details">
                                <p>
                                    <strong>Taille des colis:</strong> 
                                    <?php echo htmlspecialchars($reservation['size_colier']); ?>
                                </p>
                                
                                <?php if ($reservation['fragile'] === 'oui'): 
                                    $fragileDetails = $this->tripModel->getFragileDetails($reservation['id']);
                                ?>
                                    <div class="fragile-details">
                                        <p><strong>Détails des colis fragiles:</strong></p>
                                        <ul>
                                            <?php foreach ($fragileDetails as $detail): ?>
                                                <li>
                                                    <?php echo htmlspecialchars($detail['nbr_colier_fragile']); ?> 
                                                    colis de taille <?php echo htmlspecialchars($detail['size_colier']); ?>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>