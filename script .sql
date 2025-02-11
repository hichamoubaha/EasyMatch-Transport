CREATE DATABASE koulia;



CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(255),
    prenom VARCHAR(255),
    phone VARCHAR(20),
    email VARCHAR(255) UNIQUE,
    password VARCHAR(255),
    date_naissance DATE,
    post VARCHAR(255),
    matricule VARCHAR(50) UNIQUE,
    pays VARCHAR(100),
    ville VARCHAR(100),
    statut VARCHAR(50),
    date_bloque DATE
);

CREATE TABLE admin (
    user_id INT PRIMARY KEY REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE expediteur (
    user_id INT PRIMARY KEY REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE conducteur (
    user_id INT PRIMARY KEY REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE verify_badge (
    id SERIAL PRIMARY KEY,
    admin_id INT REFERENCES admin(user_id) ON DELETE CASCADE,
    badge_verifier VARCHAR(255),
    nombre_etoile INT
);

CREATE TABLE notification (
    id SERIAL PRIMARY KEY,
    expediteur_id INT REFERENCES expediteur(user_id) ON DELETE CASCADE,
    contenu TEXT,
    date DATE
);

CREATE TABLE avis (
    id SERIAL PRIMARY KEY,
    expediteur_id INT REFERENCES expediteur(user_id) ON DELETE CASCADE,
    conducteur_id INT REFERENCES conducteur(user_id) ON DELETE CASCADE,
    message_conducteur TEXT,
    message_expediteur TEXT
);

CREATE TABLE trajet (
    id SERIAL PRIMARY KEY,
    conducteur_id INT REFERENCES conducteur(user_id) ON DELETE CASCADE,
    point_depart VARCHAR(255),
    point_destination VARCHAR(255),
    trajet_itineraire TEXT[],
    type_vehicule VARCHAR(100),
    date_offre DATE,
    date_limite_offre DATE,
    fragile_admit VARCHAR(10),
    matricule_vehicule VARCHAR(50),
    size_colis VARCHAR(50),
    package_car TEXT[]
);

CREATE TABLE demande_expediteur (
    id SERIAL PRIMARY KEY,
    expediteur_id INT REFERENCES expediteur(user_id) ON DELETE CASCADE,
    fragile VARCHAR(10),
    date_reservation DATE
);

CREATE TABLE fragile_colier (
    id SERIAL PRIMARY KEY,
    demande_id INT REFERENCES demande_expediteur(id) ON DELETE CASCADE,
    size_colier TEXT[],
    nbr_colier_fragile INT
);
