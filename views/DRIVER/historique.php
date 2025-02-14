<?php
// Include necessary files and start session if needed
session_start();
require_once '../../controllers/DriverController.php';

// Check if driver is logged in
if (!isset($_SESSION['driver_id'])) {
    header('Location: login.php');
    exit();
}

$driverId = $_SESSION['driver_id'];
$driverController = new DriverController();
$announcements = $driverController->getDriverAnnouncements($driverId);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historique des Annonces</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Historique de mes annonces</h1>
        
        <div class="card shadow-sm">
            <div class="card-body">
                <?php if (!empty($announcements)): ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>Date</th>
                                    <th>Départ</th>
                                    <th>Destination</th>
                                    <th>Status</th>
                                    <th>Prix</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($announcements as $announcement): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($announcement['date']) ?></td>
                                        <td><?= htmlspecialchars($announcement['departure']) ?></td>
                                        <td><?= htmlspecialchars($announcement['destination']) ?></td>
                                        <td>
                                            <span class="badge bg-<?= $announcement['status'] === 'Active' ? 'success' : 'secondary' ?>">
                                                <?= htmlspecialchars($announcement['status']) ?>
                                            </span>
                                        </td>
                                        <td><?= htmlspecialchars($announcement['price']) ?> €</td>
                                        <td>
                                            <a href="detail_annonce.php?id=<?= $announcement['id'] ?>" 
                                               class="btn btn-primary btn-sm">
                                                Détails
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="alert alert-info" role="alert">
                        Aucune annonce dans l'historique.
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>