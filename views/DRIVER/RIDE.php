
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un trajet - EasyMatch Transport</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <style>

        #map {
            height: 300px;
            width: 100%;
            border-radius: 10px;
        }
        .stepper {
            display: flex;
            justify-content: space-between;
            margin-bottom: 2rem;
        }
        .step {
            flex: 1;
            text-align: center;
            padding: 1rem;
            border-bottom: 3px solid #dee2e6;
            color: #6c757d;
            cursor: pointer;
            transition: all 0.3s;
        }
        .step.active {
            border-color: #0d6efd;
            color: #0d6efd;
            font-weight: bold;
        }
        .step-content {
            display: none;
        }
        .step-content.active {
            display: block;
        }
        .waypoint-item {
            display: flex;
            align-items: center;
            margin-bottom: 0.5rem;
            padding: 0.5rem;
            background: #f8f9fa;
            border-radius: 5px;
        }
    </style>
</head>
<body class="bg-light">
<form id="transportForm" method="POST" action="http://localhost/EasyMatch-Transport/public/index.php?action=createTraject">
<div class="container mt-5">
    <input type="hidden" name="driver_id" value="<?php echo htmlspecialchars($user_id); ?>">  
        
        <!-- Stepper Header -->
        <div class="stepper">
            <div class="step active" data-step="1">📍 Départ</div>
            <div class="step" data-step="2">🚏 Étapes</div>
            <div class="step" data-step="3">🏁 Destination</div>
            <div class="step" data-step="4">✅ Confirmation</div>
        </div>

        <!-- Step 1: Départ -->
        <div class="step-content active" id="step1">
            <h5 class="mb-4">Sélectionnez le point de départ</h5>
            <select id="startLocation" name="point_depart" class="form-select mb-3" required></select>
            <button class="btn btn-primary w-100" onclick="nextStep(2)">Suivant →</button>
        </div>

        <!-- Step 2: Étapes -->
        <div class="step-content" id="step2">
            <h5 class="mb-4">Ajoutez des étapes intermédiaires</h5>
            <div class="input-group mb-3">
                <select id="waypointSelector"  class="form-select">
                    <option name="etapesintermédiaires" value="">Choisir une ville...</option>
                </select>
                <button type="button" class="btn btn-success" onclick="addWaypoint()">+ Ajouter</button>
            </div>

            <div id="waypointsList" class="mb-3"></div>

            <div class="d-flex justify-content-between">
                <button class="btn btn-secondary" onclick="prevStep()">← Précédent</button>
                <button class="btn btn-primary" onclick="nextStep(3)">Suivant →</button>
            </div>
        </div>

        <!-- Step 3: Destination -->
        <div class="step-content" id="step3">
            <h5 class="mb-4">Sélectionnez la destination finale</h5>
            <select id="endLocation" name="point_arrivee" class="form-select mb-3" required></select>
            <div class="d-flex justify-content-between">
                <button class="btn btn-secondary" onclick="prevStep()">← Précédent</button>
                <button class="btn btn-primary" onclick="nextStep(4)">Suivant →</button>
            </div>
        </div>

       <!-- Step 4: Confirmation -->

<div class="step-content" id="step4">
    <h5 class="mb-4">Détails du trajet</h5>
    
    <!-- Vehicle Details -->
    <div class="row g-3 mb-4">
        <!-- Capacity -->
        <div class="col-md-6">
            <label class="form-label">🚗 Capacité du véhicule</label>
            <select id="capacity" class="form-select" name="capasitedevehicule" required>
                <option value="1m³">1m³ (Petit colis)</option>
                <option value="3m³">3m³ (Moyen)</option>
                <option value="5m³">5m³ (Grand volume)</option>
            </select>
        </div>

        <!-- Vehicle Type -->
        <div class="col-md-6">
            <label class="form-label" for="vehicule">Type de véhicule</label>
            <select class="form-select" id="vehicule" name="typedevehicule" required>
                <option value="">Sélectionner</option>
                <option value="pickup">Pick-up</option>
                <option value="camion-frigo">Camion Frigorifique</option>
                <option value="car">Voiture</option>
                <option value="triporteur">Triporteur</option>
                <option value="moto">Moto</option>
                <option value="taxi-petit">Petit Taxi</option>
                <option value="camion">Camion</option>
                <option value="taxi-grand">Grand Taxi</option>
            </select>
        </div>

        <!-- Vehicle Registration -->
        <div class="col-md-6">
            <label class="form-label" for="matriculeVehicule">Immatriculation du véhicule</label>
            <input class="form-control" type="text" id="matriculeVehicule" name="matriculeVehicule" required>
        </div>

        <div class="col-md-6">
            <label class="form-label" for="dateFin">Date de debut de l'annonce</label>
            <input class="form-control" type="date" id="dateFin" name="date_depart" required>
        </div>
        <!-- End Date -->
        <div class="col-md-6">
            <label class="form-label" for="dateFin">Date de fin de l'annonce</label>
            <input class="form-control" type="date" id="dateFin" name="date_darrivee" required>
        </div>

        <!-- Fragile Option -->
        <div class="col-12">
            <label class="form-label d-block">Colis fragile</label>
            <div class="btn-group" role="group" aria-label="Fragile options">
                <input type="radio" class="btn-check" name="fragile" id="fragileNon" autocomplete="off">
                <label class="btn btn-outline-primary" for="fragileNon" onclick="toggleFragile('non')">Non</label>

                <input type="radio" class="btn-check" name="fragile" id="fragileOui" autocomplete="off">
                <label class="btn btn-outline-primary" for="fragileOui" onclick="toggleFragile('oui')">Oui</label>
            </div>
        </div>
    </div>

            <div id="routeSummary" class="mb-4"></div>
            <div id="map"></div>

            <button type="button" class="btn btn-success mt-4" onclick="submitForm()">🚀 voir le route</button>

            <div class="d-flex justify-content-between mt-4">
                <button class="btn btn-secondary" onclick="prevStep()">← Précédent</button>
                <button type="submit" class="btn btn-success" id="publishButton">🚀 Publier l'annonce</button>
                </div>
        </div>
    </form>
</div>

<script>
    let currentStep = 1;
    let waypointsArray = [];
    let cities = [];
    let map;

    // Initialization
    document.addEventListener("DOMContentLoaded", async () => {
        await loadCities();
        initMap();
        updateStepDisplay();
    });

    async function loadCities() {
        try {
            const response = await fetch("/EasyMatch-Transport/views/DRIVER/cities.json");
            cities = await response.json();

            // Fill selects
            fillSelect(document.getElementById('startLocation'), cities);
            fillSelect(document.getElementById('endLocation'), cities);
            fillSelect(document.getElementById('waypointSelector'), cities);
        } catch (error) {
            console.error("Erreur lors du chargement des villes:", error);
        }
    }

    function fillSelect(selectElement, cities) {
        selectElement.innerHTML = cities.map(city =>
            `<option value="${city.lng},${city.lat},${city.name}">${city.name}</option>`
        ).join('');
    }

    function initMap() {
        map = L.map('map').setView([31.6295, -7.9811], 6);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
    }

    // Stepper Navigation
    function nextStep(step) {
        currentStep = step;
        updateStepDisplay();
        if(currentStep === 4) {
            if (!map) {
                initMap();
            } else {
                map.invalidateSize();
            }
            updateRouteSummary();
        }
    }
    document.getElementById("publishButton").addEventListener("click", function(event) {
    console.log("Bouton cliqué !");
});


    function prevStep() {
        currentStep--;
        updateStepDisplay();
    }

    function updateStepDisplay() {
        // Update stepper headers
        document.querySelectorAll('.step').forEach((step, index) => {
            step.classList.toggle('active', index + 1 === currentStep);
        });

        // Show current step content
        document.querySelectorAll('.step-content').forEach(content => {
            content.classList.remove('active');
        });
        document.getElementById(`step${currentStep}`).classList.add('active');
    }

    // Waypoints Management
    function addWaypoint() {
        const select = document.getElementById('waypointSelector');
        if(select.value) {
            waypointsArray.push(select.value);
            updateWaypointsDisplay();
            select.value = '';
        }
    }

    function updateWaypointsDisplay() {
        const container = document.getElementById('waypointsList');
        container.innerHTML = waypointsArray.map((wp, index) => {
            const [lng, lat, name] = wp.split(',');
            return `
                <div class="waypoint-item">
                    <span class="flex-grow-1">${index + 1}. ${name}</span>
                    <button class="btn btn-sm btn-danger" onclick="removeWaypoint(${index})">✖</button>
                </div>
            `;
        }).join('');
    }

    function removeWaypoint(index) {
        waypointsArray.splice(index, 1);
        updateWaypointsDisplay();
    }

    // Route Summary
    function updateRouteSummary() {
        const start = document.getElementById('startLocation').value.split(',')[2];
        const end = document.getElementById('endLocation').value.split(',')[2];

        document.getElementById('routeSummary').innerHTML = `
            <p><strong>Départ:</strong> ${start}</p>
            ${waypointsArray.length > 0 ? `
            <p><strong>Étapes:</strong><br>
            ${waypointsArray.map((wp, i) => `${i + 1}. ${wp.split(',')[2]}`).join('<br>')}
            </p>` : ''}
            <p><strong>Destination:</strong> ${end}</p>
        `;
    }

    // Form Submission
    async function submitForm() {
        const start = document.getElementById('startLocation').value.split(',');
        const end = document.getElementById('endLocation').value.split(',');
        const capacity = document.getElementById('capacity').value;

        try {
            const viaParam = waypointsArray.length > 0
                ? `&via=${waypointsArray.map(wp => wp.split(',').slice(0,2).join(',')).join('|')}`
                : '';

            const url = `https://api.openrouteservice.org/v2/directions/driving-car?api_key=5b3ce3597851110001cf624855b0dd27f56d47ffbf96889a9e421e7c&start=${start[0]},${start[1]}&end=${end[0]},${end[1]}${viaParam}`;

            const response = await fetch(url);
            const data = await response.json();

            if(data.features?.length > 0) {
                const route = data.features[0].geometry.coordinates;
                L.polyline(route.map(c => [c[1], c[0]]), { color: 'red' }).addTo(map);
                map.fitBounds(L.latLngBounds(route.map(c => [c[1], c[0]])));
                alert(' le Trajet creé avec succès !');
            }
        } catch (error) {
            console.error('Erreur:', error);
            alert('Erreur lors de la publication du trajet');
        }
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>