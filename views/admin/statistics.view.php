<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Statistiques</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Statistiques de la plateforme</h1>
        <div class="bg-white shadow-md rounded-lg p-4">
            <canvas id="statisticsChart"></canvas>
        </div>
    </div>
    <script>
        const ctx = document.getElementById('statisticsChart').getContext('2d');
        const statisticsData = <?php echo json_encode($statistics); ?>; // Pass data from PHP to JS

        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Annonces Publiées', 'Demandes Envoyées', 'Transactions Réussies'],
                datasets: [{
                    label: 'Statistiques',
                    data: [statisticsData.total_ads, statisticsData.total_requests, statisticsData.total_successful_transactions],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>