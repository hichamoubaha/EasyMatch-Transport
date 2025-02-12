
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

<div class="container mt-5">
    <div class="card p-4 shadow">
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
            <select id="startLocation" class="form-select mb-3" required></select>
            <button class="btn btn-primary w-100" onclick="nextStep(2)">Suivant →</button>
        </div>

        <!-- Step 2: Étapes -->
        <div class="step-content" id="step2">
            <h5 class="mb-4">Ajoutez des étapes intermédiaires</h5>
            <div class="input-group mb-3">
                <select id="waypointSelector" class="form-select">
                    <option value="">Choisir une ville...</option>
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
            <select id="endLocation" class="form-select mb-3" required></select>
            <div class="d-flex justify-content-between">
                <button class="btn btn-secondary" onclick="prevStep()">← Précédent</button>
                <button class="btn btn-primary" onclick="nextStep(4)">Suivant →</button>
            </div>
        </div>

        <!-- Step 4: Confirmation -->
        <div class="step-content" id="step4">
            <h5 class="mb-4">Détails du trajet</h5>
            <div class="mb-3">
                <label class="form-label">🚗 Capacité du véhicule</label>
                <select id="capacity" class="form-select" required>
                    <option value="1m³">1m³ (Petit colis)</option>
                    <option value="3m³">3m³ (Moyen)</option>
                    <option value="5m³">5m³ (Grand volume)</option>
                </select>
            </div>

            <div id="routeSummary" class="mb-4"></div>
            <div id="map"></div>

            <div class="d-flex justify-content-between mt-4">
                <button class="btn btn-secondary" onclick="prevStep()">← Précédent</button>
                <button type="submit" class="btn btn-success" onclick="submitForm()">🚀 Publier le trajet</button>
            </div>
        </div>
    </div>
</div>

<script src="/public/js/add_ride.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>