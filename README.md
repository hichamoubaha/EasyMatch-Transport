# EasyMatch Transport

## Description
EasyMatch Transport est une plateforme qui connecte les conducteurs ayant de l’espace disponible dans leur véhicule avec des particuliers ou entreprises souhaitant expédier des colis. L'objectif est d'optimiser le transport de marchandises tout en réduisant les coûts et l'empreinte carbone.

## Fonctionnalités Principales

### Utilisateurs
- Inscription avec informations personnelles (nom, prénom, email, mot de passe) et gestion du compte.
- Notifications lors de l’acceptation/refus d’une demande et à la livraison du colis.
- Consultation de l’historique des envois et trajets réalisés.
- Réception d'un email de confirmation avec les détails de chaque transaction.
- Vérification de l’identité avec badge "Vérifié" après validation de l’administrateur.

### Conducteurs
- Publication d’une annonce avec itinéraire, capacité du véhicule et types de colis acceptés.
- Sélection d’un itinéraire étape par étape via un système de "stepper".
- Acceptation ou refus des demandes en fonction de l’itinéraire et de la capacité du véhicule.
- Évaluation après la transaction.

### Expéditeurs
- Recherche de conducteurs selon le point de départ et la destination.
- Envoi de demandes avec détails du colis (dimensions, poids, type de marchandise).
- Évaluation après la transaction.

### Administrateurs
- Accès à un dashboard complet pour gérer la plateforme :
  - Gestion des utilisateurs (validation, suspension, attribution de badges "Vérifié").
  - Gestion des annonces des conducteurs.
  - Suivi des transactions.
  - Gestion des évaluations.
  - Analyse des données sous forme graphique (Chart.js).

## Technologies Utilisées
- **Backend** : PHP (POO/MVC), Routing personnalisé, PostgreSQL.
- **Frontend** : HTML5, CSS3, JavaScript (ES6), Bootstrap 5 ou TailwindCSS.
- **Dynamisme** : AJAX (Fetch API & jQuery) pour le chargement dynamique des données.
- **Visualisation des données** : Chart.js pour les statistiques et rapports.

## Conception UML
- **Diagramme de cas d'utilisation** : Définit les interactions des utilisateurs avec la plateforme.
- **Diagramme de classe** : Modélise la structure des entités principales et leurs relations.

## Installation et Déploiement
### Prérequis
- PHP 8+
- PostgreSQL
- Serveur Web (Apache/Nginx)
- Composer
- Node.js (pour le frontend si nécessaire)

### Étapes d’installation
1. Cloner le dépôt :
   ```sh
   git clone https://github.com/votre-repo/easymatch-transport.git
   cd easymatch-transport
   ```
2. Installer les dépendances :
   ```sh
   composer install
   npm install
   ```
3. Configurer la base de données :
   - Modifier le fichier `.env` avec les informations de connexion.
   - Exécuter les migrations SQL :
     ```sh
     php artisan migrate
     ```
4. Lancer le serveur :
   ```sh
   php -S localhost:8000 -t public/
   ```
5. Accéder à l'application : [http://localhost:8000](http://localhost:8000)

## Contributions
Les contributions sont les bienvenues ! Merci de suivre le guide de contribution et de proposer des pull requests.

## Licence
Ce projet est sous licence MIT - voir le fichier [LICENSE](LICENSE) pour plus de détails.
