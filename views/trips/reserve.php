<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réserver un Trajet - EasyMatch Transport</title>
    <link rel="stylesheet" href="/Projet_sprint_2/EasyMatch-Transport/public/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Réserver un Trajet</h1>
        
        <div class="trip-card">
            <div class="trip-header">
                <h2><?php echo htmlspecialchars($trip['point_depart']); ?> → <?php echo htmlspecialchars($trip['point_destination']); ?></h2>
                <span class="vehicle-type"><?php echo htmlspecialchars($trip['type_vehicule']); ?></span>
            </div>

            <div class="trip-info">
                <form action="index.php?action=reserve&trip_id=<?php echo $trip['id']; ?>&user_id=<?php echo $user['id']; ?>" method="post" class="reservation-form">
                    <div class="form-group">
                        <label for="size_colier">Taille des colis (ex: 2M,3G,1P):</label>
                        <input type="text" id="size_colier" name="size_colier" required pattern="(\d+[MGP],)*\d+[MGP]">
                        <small>M: Moyen, G: Grand, P: Petit</small>
                    </div>

                    <?php if ($trip['fragile_admit'] === 'oui'): ?>
                        <div class="form-group">
                            <label for="nbr_colier_fragile">Nombre de colis fragiles:</label>
                            <input type="number" id="nbr_colier_fragile" name="nbr_colier_fragile" min="0" value="0">
                        </div>
                    <?php endif; ?>

                    <button type="submit" class="btn-reserve">Confirmer la réservation</button>
                </form>
            </div>
        </div>
        
        <a href="index.php?action=tripDetails&id=<?php echo $trip['id']; ?>&user_id=<?php echo $user['id']; ?>" class="btn-back">Retour aux détails du trajet</a>
    </div>
</body>
</html>