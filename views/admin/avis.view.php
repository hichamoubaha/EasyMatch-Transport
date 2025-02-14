<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Avis</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Gestion des Avis</h1>
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="py-2 px-4">ID</th>
                    <th class="py-2 px-4">Expéditeur</th>
                    <th class="py-2 px-4">Conducteur</th>
                    <th class="py-2 px-4">Message de l'Expéditeur</th>
                    <th class="py-2 px-4">Message du Conducteur</th>
                </tr>
            </thead>
            <tbody>
            <?php if (isset($avis) && is_array($avis)): ?>
                <?php foreach ($avis as $item): ?>
                    <tr class="border-b">
                        <td class="py-2 px-4"><?php echo $review['id']; ?></td>
                        <td class="py-2 px-4"><?php echo $review['expediteur_nom']; ?></td>
                        <td class="py-2 px-4"><?php echo $review['conducteur_nom']; ?></td>
                        <td class="py-2 px-4"><?php echo $review['message_expediteur']; ?></td>
                        <td class="py-2 px-4"><?php echo $review['message_conducteur']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="py-2 px-4 text-center">No avis found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>