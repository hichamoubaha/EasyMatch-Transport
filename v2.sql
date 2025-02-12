CREATE DATABASE easymatch_transport;

\c easymatch_transport;

CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(100),
    prenom VARCHAR(100),
    phone VARCHAR(50),
    email VARCHAR(500) UNIQUE,
    password VARCHAR(500),
    date_naissance DATE,
    post VARCHAR CHECK (post in ('admin', 'expediteur', 'conducteur')),
    matricule VARCHAR(100) UNIQUE,
    pays VARCHAR(100),
    ville VARCHAR(100),
    statut VARCHAR CHECK (statut in ('accepted', 'blocked', 'pending')),
    date_bloque DATE
);

CREATE TABLE verify_badge (
    id SERIAL PRIMARY KEY,
    conducteur INT REFERENCES users(id) ON DELETE CASCADE,
    badge_verifier VARCHAR CHECK (badge_verifier in ('oui', 'non')),
    nombre_etoile INT
);

CREATE TABLE notification (
    id SERIAL PRIMARY KEY,
    recepteur INT REFERENCES users(id) ON DELETE CASCADE,
    contenu TEXT,
    date DATE
);

CREATE TABLE avis (
    id SERIAL PRIMARY KEY,
    expediteur INT REFERENCES users(id) ON DELETE CASCADE,
    conducteur INT REFERENCES users(id) ON DELETE CASCADE,
    message_conducteur TEXT,
    message_expediteur TEXT
);

CREATE TABLE trajet (
    id SERIAL PRIMARY KEY,
    conducteur_id INT REFERENCES users(id) ON DELETE CASCADE,
    point_depart VARCHAR(100),
    point_destination VARCHAR(100),
    date_offre DATE,
    date_limite_offre DATE,
    trajet_itineraire TEXT,
    type_vehicule VARCHAR(100),
    description TEXT,
    fragile_admit VARCHAR CHECK (fragile_admit in ('oui', 'non')),        
    matricule_vehicule VARCHAR(100),
    size_colis VARCHAR(50),
    package_car TEXT
);

CREATE TABLE demande_expediteur (
    id SERIAL PRIMARY KEY,
    expediteur_id INT REFERENCES users(id) ON DELETE CASCADE,
    fragile VARCHAR CHECK (fragile in ('oui', 'non')) DEFAULT 'non',
    date_reservation DATE
);

CREATE TABLE fragile_colier_reservé (
    id SERIAL PRIMARY KEY,
    demande_id INT REFERENCES demande_expediteur(id) ON DELETE CASCADE,
    size_colier TEXT,
    nbr_colier_fragile INT
);
