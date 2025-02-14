<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Suivi des Transactions</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Suivi des Transactions</h1>
        
        <h2 class="text-xl font-semibold mb-2">Liste des Trajets</h2>
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden mb-6">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="py-2 px-4">ID</th>
                    <th class="py-2 px-4">Conducteur</th>
                    <th class="py-2 px-4">Point de Départ</th>
                    <th class="py-2 px-4">Point de Destination</th>
                    <th class="py-2 px-4">Date d'Offre</th>
                    <th class="py-2 px-4">Statut</th>
                </tr>
            </thead>
            <tbody>
            <?php if (isset($trips) && is_array($trips)): ?>
                <?php foreach ($trips as $trip): ?>
                    <tr class="border-b">
                        <td class="py-2 px-4"><?php echo $trip['id']; ?></td>
                        <td class="py-2 px-4"><?php echo $trip['conducteur_nom'] . ' ' . $trip['conducteur_prenom']; ?></td>
                        <td class="py-2 px-4"><?php echo $trip['point_depart']; ?></td>
                        <td class="py-2 px-4"><?php echo $trip['point_destination']; ?></td>
                        <td class="py-2 px-4"><?php echo $trip['date_offre']; ?></td>
                        <td class="py-2 px-4"><?php echo $trip['statut']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="py-2 px-4 text-center">No trips found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <h2 class="text-xl font-semibold mb-2">Liste des Demandes</h2>
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="py-2 px-4">ID</th>
                    <th class="py-2 px-4">Expéditeur</th>
                    <th class="py-2 px-4">Fragile</th>
                    <th class="py-2 px-4">Date de Réservation</th>
                    <th class="py-2 px-4">Note</th>
                </tr>
            </thead>
            <tbody>
            <?php if (isset($demandes) && is_array($demandes)): ?>
                <?php foreach ($demandes as $demande): ?>
                    <tr class="border-b">
                        <td class="py-2 px-4"><?php echo $demande['id']; ?></td>
                        <td class="py-2 px-4"><?php echo $demande['expediteur_nom'] . ' ' . $demande['expediteur_prenom']; ?></td>
                        <td class="py-2 px-4"><?php echo $demande['fragile']; ?></td>
                        <td class="py-2 px-4"><?php echo $demande['date_reservation']; ?></td>
                        <td class="py-2 px-4"><?php echo $demande['note']; ?></td>
                    </tr>
                    <div><?php echo htmlspecialchars($demande['expediteur_nom']); ?></div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="py-2 px-4 text-center">No Demandes found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>