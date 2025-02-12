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
        const response = await fetch("cities.json");
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
            L.polyline(route.map(c => [c[1], c[0]]), { color: 'blue' }).addTo(map);
            map.fitBounds(L.latLngBounds(route.map(c => [c[1], c[0]])));
            alert('Trajet publié avec succès !');
        }
    } catch (error) {
        console.error('Erreur:', error);
        alert('Erreur lors de la publication du trajet');
    }
}