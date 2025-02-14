<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kolia - offer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .stepper {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .step {
            text-align: center;
            flex: 1;
            position: relative;
        }

        .step-number {
            display: inline-block;
            width: 30px;
            height: 30px;
            line-height: 30px;
            border-radius: 50%;
            background-color: #ccc;
            color: #fff;
        }

        .step-label {
            display: block;
            margin-top: 5px;
        }

        .step.active .step-number {
            background-color: #007bff;
        }

        .step-content {
            border: 1px solid #ddd;
            padding: 20px;
        }

        .step-pane {
            display: none;
        }

        .step-pane.active {
            display: block;
        }

        .intermediate-city {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }

        .intermediate-city input {
            flex: 1;
            margin-right: 10px;
            padding: 5px;
        }

        .remove-city {
            background-color: #ff4d4d;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

        .remove-city:hover {
            background-color: #cc0000;
        }

        #add-city {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            margin-bottom: 10px;
        }

        #add-city:hover {
            background-color: #0056b3;
        }

        button {
            margin-top: 10px;
            padding: 5px 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="stepper">

        <div class="step" data-step="1">
            <span class="step-number">1</span>
            <span class="step-label">information de colis</span>
        </div>

        <div class="step" data-step="2">
            <span class="step-number">2</span>
            <span class="step-label">Départ</span>
        </div>
        <div class="step" data-step="3">
            <span class="step-number">3</span>
            <span class="step-label">Villes intermédiaires</span>
        </div>
        <div class="step" data-step="4">
            <span class="step-number">4</span>
            <span class="step-label">Destination finale</span>
        </div>
    </div>

    <div class="step-content">
        <form id="stepper-form">
            <!-- Étape 1 : infor de colis -->
            <div id="step-2" class="step-pane active">
                <label for="type-coli">Type de colis accepter :</label>
                <select name="type-coli" id="type-coli">
                    <option value="s">S</option>
                    <option value="m">M</option>
                    <option value="l">L</option>
                </select>

                <fieldset>

                    <legend>Fragile:</legend>
                  
                    <div>
                      <input type="radio" id="nom" name="fragile" value="nom" checked />
                      <label for="nom">Nom</label>
                    </div>
                  
                    <div>
                      <input type="radio" id="oui" name="fragile" value="oui" />
                      <label for="dewey">Oui</label>
                    </div>

                </fieldset>
                  
                <button type="button" class="next-step">Suivant</button>

            </div>

            <!-- Étape 2 : Départ -->
            <div id="step-2" class="step-pane">
                <label for="departure">Point de départ :</label>
                <input type="text" id="departure" placeholder="Saisissez une ville" required>
                <button type="button" class="next-step">Suivant</button>
            </div>

            <!-- Étape 3 : Villes intermédiaires -->
            <div id="step-3" class="step-pane">
                <label>Villes intermédiaires :</label>
                <div id="intermediate-cities-container">
                    <div class="intermediate-city">
                        <input type="text" class="intermediate-city-input" placeholder="Saisissez une ville" required>
                        <button type="button" class="remove-city">Supprimer</button>
                    </div>
                </div>
                <button type="button" id="add-city">Ajouter une ville</button>
                <button type="button" class="prev-step">Précédent</button>
                <button type="button" class="next-step">Suivant</button>
            </div>

            <!-- Étape 4 : Destination finale -->
            <div id="step-4" class="step-pane">
                <label for="destination">Destination finale :</label>
                <input type="text" id="destination" placeholder="Saisissez une ville" required>
                <button type="button" class="prev-step">Précédent</button>
                <button type="submit" id="submit">Terminer</button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const steps = document.querySelectorAll('.step');
            const stepPanes = document.querySelectorAll('.step-pane');
            let currentStep = 0;

            // Afficher l'étape actuelle
            function showStep(stepIndex) {
                steps.forEach((step, index) => {
                    if (index === stepIndex) {
                        step.classList.add('active');
                    } else {
                        step.classList.remove('active');
                    }
                });

                stepPanes.forEach((pane, index) => {
                    if (index === stepIndex) {
                        pane.classList.add('active');
                    } else {
                        pane.classList.remove('active');
                    }
                });
            }

            // Ajouter une ville intermédiaire
            document.getElementById('add-city').addEventListener('click', () => {
                const container = document.getElementById('intermediate-cities-container');
                const newCityField = document.createElement('div');
                newCityField.classList.add('intermediate-city');
                newCityField.innerHTML = `
                    <input type="text" class="intermediate-city-input" placeholder="Saisissez une ville" required>
                    <button type="button" class="remove-city">Supprimer</button>
                `;
                container.appendChild(newCityField);

                // Supprimer une ville intermédiaire
                newCityField.querySelector('.remove-city').addEventListener('click', () => {
                    newCityField.remove();
                });
            });

            // Bouton "Suivant"
            document.querySelectorAll('.next-step').forEach(button => {
                button.addEventListener('click', () => {
                    if (validateStep(currentStep)) {
                        if (currentStep < steps.length - 1) {
                            currentStep++;
                            showStep(currentStep);
                        }
                    }
                });
            });

            // Bouton "Précédent"
            document.querySelectorAll('.prev-step').forEach(button => {
                button.addEventListener('click', () => {
                    if (currentStep > 0) {
                        currentStep--;
                        showStep(currentStep);
                    }
                });
            });

            // Valider l'étape actuelle
            function validateStep(stepIndex) {
                let isValid = true;

                if (stepIndex === 0) {
                    // Validation de l'étape 1 (Départ)
                    const departure = document.getElementById('departure').value;
                    if (!departure.trim()) {
                        alert("Veuillez saisir un point de départ.");
                        isValid = false;
                    }
                } else if (stepIndex === 1) {
                    // Validation de l'étape 2 (Villes intermédiaires)
                    const cities = document.querySelectorAll('.intermediate-city-input');
                    cities.forEach(city => {
                        if (!city.value.trim()) {
                            alert("Veuillez saisir toutes les villes intermédiaires.");
                            isValid = false;
                        }
                    });
                } else if (stepIndex === 2) {
                    // Validation de l'étape 3 (Destination finale)
                    const destination = document.getElementById('destination').value;
                    if (!destination.trim()) {
                        alert("Veuillez saisir une destination finale.");
                        isValid = false;
                    }
                }

                return isValid;
            }

            // Soumission du formulaire
            document.getElementById('stepper-form').addEventListener('submit', function (e) {
                e.preventDefault();

                const departure = document.getElementById('departure').value;
                const intermediateCities = Array.from(document.querySelectorAll('.intermediate-city-input')).map(input => input.value);
                const destination = document.getElementById('destination').value;

                const data = {
                    departure,
                    intermediateCities,
                    destination,
                };

                console.log(data);  // Afficher les données dans la console
                alert("Formulaire soumis avec succès !");
            });

            // Initialisation : afficher la première étape
            showStep(currentStep);
        });
    </script>
</body>
</html>