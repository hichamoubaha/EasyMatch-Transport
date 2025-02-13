<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Trajet - EasyMatch Transport</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Détails du Trajet</h1>
        
        <?php if ($trip): ?>
            <div class="trip-details">
                <h2><?= htmlspecialchars($trip['point_depart']) ?> → <?= htmlspecialchars($trip['point_destination']) ?></h2>
                <p>Conducteur: <?= htmlspecialchars($trip['conducteur_prenom'] . ' ' . $trip['conducteur_nom']) ?></p>
                <p>Date de l'offre: <?= htmlspecialchars($trip['date_offre']) ?></p>
                <p>Date limite: <?= htmlspecialchars($trip['date_limite_offre']) ?></p>
                <p>Type de véhicule: <?= htmlspecialchars($trip['type_vehicule']) ?></p>
                <p>Immatriculation: <?= htmlspecialchars($trip['matricule_vehicule']) ?></p>
                <p>Taille des colis: <?= htmlspecialchars($trip['size_colis']) ?></p>
                <p>Fragile admis: <?= htmlspecialchars($trip['fragile_admit']) ?></p>
                <?php if ($trip['description']): ?>
                    <p>Description: <?= htmlspecialchars($trip['description']) ?></p>
                <?php endif; ?>
                <?php if ($trip['note']): ?>
                    <p>Note: <?= htmlspecialchars($trip['note']) ?></p>
                <?php endif; ?>
            </div>
        <?php else: ?>
            <p>Trajet non trouvé.</p>
        <?php endif; ?>
        
        <a href="?action=index" class="btn-back">Retour à la liste</a>
    </div>
    <script src="/js/main.js"></script>
</body>
</html>