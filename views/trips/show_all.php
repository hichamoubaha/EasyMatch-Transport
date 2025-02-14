<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tous les Trajets - EasyMatch Transport</title>
    <link rel="stylesheet" href="/Projet_sprint_2/EasyMatch-Transport/public/css/style.css">
</head>
<body>


<?php if (isset($_SESSION['success_message'])): ?>
    <div class="alert alert-success">
        <?php 
        echo $_SESSION['success_message'];
        unset($_SESSION['success_message']);
        ?>
    </div>
<?php endif; ?>

<?php if (isset($_SESSION['error_message'])): ?>
    <div class="alert alert-danger">
        <?php 
        echo $_SESSION['error_message'];
        unset($_SESSION['error_message']);
        ?>
    </div>
<?php endif; ?>

<!-- Le reste du code pour afficher la liste des trajets -->
    <div class="container">
        <?php if ($user): ?>
            <h1>
                Bonjour <?php echo $user['sexe'] == 'F' ? 'Madame' : 'Monsieur'; ?> 
                <?php echo htmlspecialchars($user['prenom'] . ' ' . $user['nom']); ?>
            </h1>
        <?php else: ?>
            <h1>Tous les Trajets</h1>
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

                        <a href="index.php?action=tripDetails&id=<?php echo $trip['id']; ?>&user_id=<?php echo $user ? $user['id'] : ''; ?>" class="btn-details">
                            Voir les détails
                        </a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>
</html>