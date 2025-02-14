<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Trajet - EasyMatch Transport</title>
    <link rel="stylesheet" href="/Projet_sprint_2/EasyMatch-Transport/public/css/style.css">
</head>
<body>
    <div class="container">
        <div class="header-with-cart">
            <h1>Détails du Trajet</h1>
            <a href="index.php?action=viewCart&user_id=<?php echo htmlspecialchars($userId); ?>" class="cart-icon">
                🛒 Panier
                <?php if (isset($cartCount) && $cartCount > 0): ?>
                    <span class="cart-count"><?php echo $cartCount; ?></span>
                <?php endif; ?>
            </a>
        </div>

        <?php if (isset($_SESSION['error_message'])): ?>
            <div class="alert alert-danger">
                <?php 
                echo htmlspecialchars($_SESSION['error_message']);
                unset($_SESSION['error_message']);
                ?>
            </div>
        <?php endif; ?>
        
        <div class="trip-card">
            <div class="trip-header">
                <h2><?php echo htmlspecialchars($trip['point_depart']); ?> → <?php echo htmlspecialchars($trip['point_destination']); ?></h2>
                <span class="vehicle-type"><?php echo htmlspecialchars($trip['type_vehicule']); ?></span>
            </div>

            <div class="trip-info">
                <div class="driver-info">
                    <div class="avatar">
                        <?php echo isset($trip['conducteur_prenom']) ? strtoupper(substr($trip['conducteur_prenom'], 0, 1)) : '?'; ?>
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

                <button id="openReservationModal" class="btn-reserve">Réserver</button>
            </div>
        </div>
        
        <a href="index.php?action=showtrajet&user_id=<?php echo htmlspecialchars($userId); ?>" class="btn-back">
            Retour à la liste des trajets
        </a>
    </div>

    <!-- Modal de réservation -->
    <div id="reservationModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Réserver des colis</h2>
            <form action="index.php" method="post" id="reservationForm">
                <input type="hidden" name="action" value="reserve">
                <input type="hidden" name="trip_id" value="<?php echo htmlspecialchars($trip['id']); ?>">
                <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($userId); ?>">
                
                <h3>Colis standards</h3>
                <?php
                $sizeColis = explode(',', $trip['size_colis']);
                foreach ($sizeColis as $size): 
                    preg_match('/(\d+)([MGP])/', $size, $matches);
                    if (count($matches) === 3):
                        $maxCount = $matches[1];
                        $sizeLabel = $matches[2];
                ?>
                    <div class="form-group">
                        <label for="colis_<?php echo $sizeLabel; ?>">
                            Nombre de colis <?php echo $sizeLabel; ?> (max <?php echo $maxCount; ?>):
                        </label>
                        <input type="number" 
                               id="colis_<?php echo $sizeLabel; ?>" 
                               name="colis[<?php echo $sizeLabel; ?>]" 
                               min="0" 
                               max="<?php echo $maxCount; ?>" 
                               value="0"
                               class="form-control">
                    </div>
                <?php 
                    endif;
                endforeach; 
                ?>

                <div class="form-group">
                    <label for="fragile_admit">Colis fragile ?</label>
                    <select id="fragile_admit" name="fragile_admit" class="form-control">
                        <option value="non">Non</option>
                        <option value="oui">Oui</option>
                    </select>
                </div>

                <div id="fragile_colis_section" style="display: none;">
                    <h3>Colis fragiles</h3>
                    <div class="form-group">
                        <label for="fragile_colis_G">Nombre de colis fragiles G:</label>
                        <input type="number" 
                               id="fragile_colis_G" 
                               name="fragile_colis[G]" 
                               min="0" 
                               value="0"
                               class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="fragile_colis_M">Nombre de colis fragiles M:</label>
                        <input type="number" 
                               id="fragile_colis_M" 
                               name="fragile_colis[M]" 
                               min="0" 
                               value="0"
                               class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="fragile_colis_P">Nombre de colis fragiles P:</label>
                        <input type="number" 
                               id="fragile_colis_P" 
                               name="fragile_colis[P]" 
                               min="0" 
                               value="0"
                               class="form-control">
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-reserve">Confirmer la réservation</button>
                </div>
            </form>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var modal = document.getElementById("reservationModal");
        var btn = document.getElementById("openReservationModal");
        var span = document.getElementsByClassName("close")[0];
        var fragileSelect = document.getElementById('fragile_admit');
        var fragileColis = document.getElementById('fragile_colis_section');

        btn.onclick = function() {
            modal.style.display = "block";
        }

        span.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        fragileSelect.addEventListener('change', function() {
            fragileColis.style.display = this.value === 'oui' ? 'block' : 'none';
            if (this.value === 'non') {
                document.querySelectorAll('#fragile_colis_section input[type="number"]').forEach(function(input) {
                    input.value = '0';
                });
            }
        });

        document.getElementById('reservationForm').addEventListener('submit', function(e) {
            var totalColis = 0;
            var inputs = this.querySelectorAll('input[type="number"][name^="colis"]');
            
            inputs.forEach(function(input) {
                totalColis += parseInt(input.value) || 0;
            });

            if (totalColis === 0) {
                e.preventDefault();
                alert('Veuillez sélectionner au moins un colis.');
                return false;
            }

            if (fragileSelect.value === 'oui') {
                var totalFragile = 0;
                var fragileInputs = document.querySelectorAll('#fragile_colis_section input[type="number"]');
                
                fragileInputs.forEach(function(input) {
                    totalFragile += parseInt(input.value) || 0;
                });

                if (totalFragile === 0) {
                    e.preventDefault();
                    alert('Veuillez spécifier au moins un colis fragile.');
                    return false;
                }

                if (totalFragile > totalColis) {
                    e.preventDefault();
                    alert('Le nombre de colis fragiles ne peut pas être supérieur au nombre total de colis.');
                    return false;
                }
            }
        });
    });
    </script>
</body>
</html>