<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Panier - EasyMatch Transport</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="cart-container">
            <h1 class="cart-title">
                <i class="fas fa-shopping-cart"></i>
                Mon Panier de Réservations
            </h1>

            <!-- Messages de succès et d'erreur -->

            <?php if (empty($cartItems)): ?>
                <div class="empty-cart">
                    <i class="fas fa-shopping-basket"></i>
                    <p>Votre panier est vide</p>
                    <a href="?action=index&user_id=<?= $userId ?>" class="btn-primary">Voir les trajets disponibles</a>
                </div>
            <?php else: ?>
                <div class="cart-items">
                    <?php foreach ($cartItems as $trip): ?>
                        <div class="cart-item">
                            <!-- Contenu de l'élément du panier -->
                            <div class="item-actions">
                                <a href="?action=removeFromCart&id=<?= $trip['id'] ?>&user_id=<?= $userId ?>" class="btn-remove">
                                    <i class="fas fa-trash"></i>
                                    Retirer
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <div class="cart-footer">
                        <a href="?action=index&user_id=<?= $userId ?>" class="btn-secondary">
                            <i class="fas fa-arrow-left"></i>
                            Continuer les réservations
                        </a>
                        <a href="?action=checkout&user_id=<?= $userId ?>" class="btn-primary">
                            <i class="fas fa-check"></i>
                            Valider les réservations
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>