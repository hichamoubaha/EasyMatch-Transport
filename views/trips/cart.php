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

        <?php if (isset($_SESSION['error_message'])): ?>
            <div class="alert alert-danger">
                <?php 
                echo htmlspecialchars($_SESSION['error_message']);
                unset($_SESSION['error_message']);
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
                    <div class="reservation-card">
                        <div class="reservation-header">
                            <h3>Réservation #<?php echo htmlspecialchars($reservation['id']); ?></h3>
                            <span class="reservation-date">
                                <?php echo date('d/m/Y H:i', strtotime($reservation['date_reservation'])); ?>
                            </span>
                        </div>
                        <div class="reservation-details">
                            <p>
                                <strong>De:</strong> 
                                <?php echo htmlspecialchars($reservation['point_depart']); ?>
                            </p>
                            <p>
                                <strong>À:</strong> 
                                <?php echo htmlspecialchars($reservation['point_destination']); ?>
                            </p>
                            <p>
                                <strong>Taille des colis:</strong> 
                                <?php echo htmlspecialchars($reservation['size_colier']); ?>
                            </p>
                            <?php if ($reservation['fragile'] === 'oui'): ?>
                                <p>
                                    <strong>Colis fragiles:</strong> 
                                    <?php echo htmlspecialchars($reservation['nbr_colier_fragile']); ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>