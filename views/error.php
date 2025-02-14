<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erreur - EasyMatch Transport</title>
    <link rel="stylesheet" href="/Projet_sprint_2/EasyMatch-Transport/public/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Une erreur est survenue</h1>
        <?php if (isset($_SESSION['error_message'])): ?>
            <div class="alert alert-danger">
                <?php 
                echo htmlspecialchars($_SESSION['error_message']);
                unset($_SESSION['error_message']);
                ?>
            </div>
        <?php endif; ?>
        <a href="index.php" class="btn-back">Retour à la page d'accueil</a>
    </div>
</body>
</html>