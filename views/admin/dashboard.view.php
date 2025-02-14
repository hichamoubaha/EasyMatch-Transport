<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-1/4 bg-gray-800 text-white min-h-screen p-4">
            <h2 class="text-xl font-bold mb-4">Navigation</h2>
            <ul>
                
                <li class="mb-2"><a href="?action=admin/dashboard" class="hover:underline">Gestion des utilisateurs</a></li>
                <li class="mb-2"><a href="?action=admin/offers" class="hover:underline">Gestion des annonces</a></li>
                <li class="mb-2"><a href="?action=admin/transactions" class="hover:underline">Suivi des transactions</a></li>
                <li class="mb-2"><a href="?action=admin/avis" class="hover:underline">Gestion des évaluations</a></li>
                <li class="mb-2"><a href="?action=admin/statistics" class="hover:underline">Statistiques et rapports</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="w-3/4 p-4">
            <h1 class="text-2xl font-bold mb-4">Admin Dashboard</h1>
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="py-2 px-4">ID</th>
                        <th class="py-2 px-4">Nom</th>
                        <th class="py-2 px-4">Prénom</th>
                        <th class="py-2 px-4">Email</th>
                        <th class="py-2 px-4">Statut</th>
                        <th class="py-2 px-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (!empty($users) && is_array($users)): ?>
                    <?php foreach ($users as $user): ?>
                        <tr class="border-b">
                            <td class="py-2 px-4"><?php echo $user->id; ?></td>
                            <td class="py-2 px-4"><?php echo $user->nom; ?></td>
                            <td class="py-2 px-4"><?php echo $user->prenom; ?></td>
                            <td class="py-2 px-4"><?php echo $user->email; ?></td>
                            <td class="py-2 px-4"><?php echo $user->statut; ?></td>
                            <td class="py-2 px-4">
                                <a href="admin/validate/<?php echo $user->id; ?>" class="text-blue-500 hover:underline">Valider</a>
                                <a href="admin/suspend/<?php echo $user->id; ?>" class="text-red-500 hover:underline ml-2">Suspendre</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="py-2 px-4 text-center">No users found.</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>