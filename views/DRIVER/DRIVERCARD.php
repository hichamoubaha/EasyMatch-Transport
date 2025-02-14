








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyMatch Transport - Driver Card</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <style>
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: scale(1.02);
        }
        #map {
            height: 300px;
            border-radius: 10px;
        }
    </style>
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-3">
                <div class="d-flex align-items-center">
                    <img src="<?= htmlspecialchars($driver['photo'] ?? 'https://via.placeholder.com/80') ?>" class="rounded-circle me-3" alt="Driver">
                    <div>
                        <h5 class="mb-0"><?= htmlspecialchars($driver['name']) ?></h5>
                        <small class="text-muted">علامة الزرقاء ✅</small>
                    </div>
                </div>
                <div class="mt-3">
                    <p><strong>Route:</strong> <?= htmlspecialchars($driver['departure']) ?> → <?= htmlspecialchars($driver['destination']) ?></p>
                    <p><strong>Vehicle Capacity:</strong> <?= htmlspecialchars($driver['capacity']) ?>m³ (Max <?= htmlspecialchars($driver['max_weight']) ?>kg)</p>
                    <button class="btn btn-primary w-100" onclick="showRoute()">View Route</button>
                </div>
                <div id="map" class="mt-3"></div>
            </div>
        </div>
    </div>
</div>

<script>
    var map = L.map('map').setView([46.6031, 1.8883], 6);

    L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
        attribution: '&copy; <a href="https://carto.com/">CartoDB</a>'
    }).addTo(map);

    const apiKey = "5b3ce3597851110001cf624855b0dd27f56d47ffbf96889a9e421e7c";
    const start = [<?= htmlspecialchars($driver['start_lat']) ?>, <?= htmlspecialchars($driver['start_lng']) ?>];
    const end = [<?= htmlspecialchars($driver['end_lat']) ?>, <?= htmlspecialchars($driver['end_lng']) ?>];

    async function showRoute() {
        const url = `https://api.openrouteservice.org/v2/directions/driving-car?api_key=${apiKey}&start=${start[1]},${start[0]}&end=${end[1]},${end[0]}`;
        
        try {
            let response = await fetch(url);
            let data = await response.json();
            let coords = data.features[0].geometry.coordinates.map(c => [c[1], c[0]]);

            L.polyline(coords, { color: 'blue', weight: 4 }).addTo(map);
            map.fitBounds(L.latLngBounds([start, end]));
        } catch (error) {
            console.error("Error fetching the route:", error);
        }
    }
</script>

</body>
</html>