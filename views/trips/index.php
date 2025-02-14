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
                                <?php echo strtoupper(substr($trip['conducteur_prenom'] ?? 'U', 0, 1)); ?>
                            </div>
                            <div class="details">
                                <p class="name">
                                    <?php 
                                    if (isset($trip['conducteur_prenom']) && isset($trip['conducteur_nom'])) {
                                        echo htmlspecialchars($trip['conducteur_prenom'] . ' ' . $trip['conducteur_nom']);
                                    } else {
                                        echo "Conducteur non spécifié";
                                    }
                                    ?>
                                </p>
                                <p class="vehicle"><?php echo htmlspecialchars($trip['matricule_vehicule']); ?></p>
                            </div>
                        </div>

                        <?php if(isset($trip['trajet_itineraire']) && !empty($trip['trajet_itineraire'])) : ?>
                            <div class="route-info">
                                <h3>Itinéraire</h3>
                                <p><?php echo htmlspecialchars($trip['trajet_itineraire']); ?></p>
                            </div>
                        <?php endif; ?>

                        <div class="package-info">
                            <div class="size">
                                <strong>Taille de colis:</strong> 
                                <?php echo htmlspecialchars($trip['size_colis']); ?>
                            </div>
                            <?php if($trip['fragile_admit'] === 'oui') : ?>
                                <div class="fragile">
                                    <span class="badge">Fragile accepté</span>
                                </div>
                            <?php endif; ?>
                        </div>

                        <?php if(isset($trip['description']) && !empty($trip['description'])) : ?>
                            <div class="description">
                                <?php echo htmlspecialchars($trip['description']); ?>
                            </div>
                        <?php endif; ?>

                        <div class="dates">
                            <p>Offre publiée le: <?php echo date('d/m/Y', strtotime($trip['date_offre'])); ?></p>
                            <p>Valable jusqu'au: <?php echo date('d/m/Y', strtotime($trip['date_limite_offre'])); ?></p>
                        </div>

                        <a href="index.php?action=tripDetails&id=<?php echo htmlspecialchars($trip['id']); ?>&user_id=<?php echo htmlspecialchars($userId); ?>" class="btn-details">
                            Voir les détails
                        </a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>
</html>