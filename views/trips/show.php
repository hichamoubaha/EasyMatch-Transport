<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Trajet - EasyMatch Transport</title>
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Détails du Trajet</h1>
        
        <div class="trip-card">
            <div class="trip-header">
                <h2><?php echo htmlspecialchars($trip['point_depart']); ?> → <?php echo htmlspecialchars($trip['point_destination']); ?></h2>
                <span class="vehicle-type"><?php echo htmlspecialchars($trip['type_vehicule']); ?></span>
            </div>

            <div class="trip-info">
                <div class="driver-info">
                    <div class="avatar">
                        <?php echo strtoupper(substr($trip['expediteur_prenom'], 0, 1)); ?>
                    </div>
                    <div class="details">
                        <p class="name"><?php echo htmlspecialchars($trip['expediteur_prenom'] . ' ' . $trip['expediteur_nom']); ?></p>
                        <p class="vehicle"><?php echo htmlspecialchars($trip['matricule_vehicule']); ?></p>
                    </div>
                </div>

                <?php if($trip['trajet_itineraire']) : ?>
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

                <?php if($trip['description']) : ?>
                    <div class="description">
                        <?php echo htmlspecialchars($trip['description']); ?>
                    </div>
                <?php endif; ?>

                <div class="dates">
                    <p>Offre publiée le: <?php echo date('d/m/Y', strtotime($trip['date_offre'])); ?></p>
                    <p>Valable jusqu'au: <?php echo date('d/m/Y', strtotime($trip['date_limite_offre'])); ?></p>
                </div>
            </div>
        </div>
        
        <a href="index.php?action=showtrajet" class="btn-back">Retour à la liste des trajets</a>
    </div>
</body>
</html>