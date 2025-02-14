<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Trajets - EasyMatch Transport</title>
    <link rel="stylesheet" href="/Projet_sprint_2/EasyMatch-Transport/public/css/style.css">
</head>
<body>
    <div class="container">
        <div class="header-with-cart">
            <h1>Liste des Trajets Disponibles</h1>
            <a href="index.php?action=viewCart&user_id=<?php echo htmlspecialchars($userId); ?>" class="cart-link">
                🛒 Panier
                <?php if (isset($cartCount) && $cartCount > 0): ?>
                    <span class="cart-count"><?php echo $cartCount; ?></span>
                <?php endif; ?>
            </a>
        </div>
        
        <div class="trips-grid">
            <?php while($trip = $trips->fetch(PDO::FETCH_ASSOC)) : ?>
                <div class="trip-card">
                    <div class="trip-header">
                        <h2><?php echo htmlspecialchars($trip['point_depart']); ?> → <?php echo htmlspecialchars($trip['point_destination']); ?></h2>
                        <span class="vehicle-type"><?php echo htmlspecialchars($trip['type_vehicule']); ?></span>
                    </div>

                    <div class="trip-info">
                        <div class="driver-info">
                            <div class="avatar">
                                <?php echo strtoupper(substr($trip['conducteur_prenom'], 0, 1)); ?>
                            </div>
                            <div class="driver-details">
                                <p class="driver-name">
                                    <?php echo htmlspecialchars($trip['conducteur_prenom'] . ' ' . $trip['conducteur_nom']); ?>
                                </p>
                                <p class="driver-id">
                                    <?php echo htmlspecialchars($trip['matricule_vehicule']); ?>
                                </p>
                            </div>
                        </div>

                        <div class="trip-details">
                            <span class="detail-label">Itinéraire</span>
                            <span class="detail-value">
                                <?php echo htmlspecialchars($trip['trajet_itineraire'] ?? 'Non spécifié'); ?>
                            </span>

                            <span class="detail-label">Taille de colis</span>
                            <span class="detail-value">
                                <?php echo htmlspecialchars($trip['size_colis']); ?>
                            </span>
                        </div>

                        <a href="index.php?action=tripDetails&id=<?php echo $trip['id']; ?>&user_id=<?php echo htmlspecialchars($userId); ?>" 
                           class="btn-reserve">
                            Réserver
                        </a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>
</html>