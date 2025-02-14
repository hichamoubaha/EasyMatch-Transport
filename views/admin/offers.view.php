<!-- views/admin/offers.view.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Annonces</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">
    <h1 class="text-2xl font-bold mb-4">Gestion des Annonces</h1>
    <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="py-2 px-4">ID</th>
                <th class="py-2 px-4">Conducteur</th>
                <th class="py-2 px-4">Point de départ</th>
                <th class="py-2 px-4">Point d'arrivée</th>
                <th class="py-2 px-4">Date d'offre</th>
                <th class="py-2 px-4">Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($offers) && is_array($offers)): ?>
            <?php foreach ($offers as $offer): ?>
                <tr class="border-b">
                    <td class="py-2 px-4"><?php echo $offer['id']; ?></td>
                    <td class="py-2 px-4"><?php echo $offer['conducteur_id']; ?></td>
                    <td class="py-2 px-4"><?php echo $offer['point_depart']; ?></td>
                    <td class="py-2 px-4"><?php echo $offer['point_destination']; ?></td>
                    <td class="py-2 px-4"><?php echo $offer['date_offre']; ?></td>
                    <td class="py-2 px-4">
                        <a href="admin/accept?id=<?php echo $offer['id']; ?>" class="text-green-500 hover:underline">Accepter</a>
                        <a href="admin/refuse?id=<?php echo $offer['id']; ?>" class="text-red-500 hover:underline ml-2">Refuser</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="py-2 px-4 text-center">No offers found.</td>
                    </tr>
                <?php endif; ?>
        </tbody>
    </table>
</body>
</html>