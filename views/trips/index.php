<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Trajets - EasyMatch Transport</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Liste des Trajets Disponibles</h1>
        
        <div class="trips-grid">
            <?php if ($trips && $trips->rowCount() > 0): ?>
                <?php while($trip = $trips->fetch()): ?>
                    <div class="trip-card">
                        <div class="trip-header">
                            <h2><?= htmlspecialchars($trip['point_depart']) ?> → <?= htmlspecialchars($trip['point_destination']) ?></h2>
                            <span class="vehicle-type"><?= htmlspecialchars($trip['type_vehicule']) ?></span>
                        </div>
                        <div class="trip-info">
                            <p>Conducteur: <?= htmlspecialchars($trip['conducteur_prenom'] . ' ' . $trip['conducteur_nom']) ?></p>
                            <p>Date: <?= htmlspecialchars($trip['date_offre']) ?></p>
                            <p>Véhicule: <?= htmlspecialchars($trip['matricule_vehicule']) ?></p>
                            <?php if ($trip['fragile_admit'] === 'oui'): ?>
                                <p class="fragile">Colis fragiles acceptés</p>
                            <?php endif; ?>
                            <a href="?action=show&id=<?= $trip['id'] ?>" class="btn-details">Voir les détails</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>Aucun trajet disponible pour le moment.</p>
            <?php endif; ?>
        </div>
    </div>
    <script src="/js/main.js"></script>
</body>
</html>