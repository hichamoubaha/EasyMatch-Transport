<?php
// Fichier: config/config.php

// Configuration de la base de données
define('DB_HOST', 'localhost');
define('DB_NAME', 'koulia');
define('DB_USER', 'postgres');
define('DB_PASS', '1111');

// Configuration de l'application
define('APP_NAME', 'EasyMatch Transport');
define('APP_URL', 'http://localhost/Projet_sprint_2/EasyMatch-Transport');

// Configuration des chemins
define('ROOT_PATH', dirname(__DIR__));
define('CONFIG_PATH', ROOT_PATH . '/config/');
define('CONTROLLER_PATH', ROOT_PATH . '/controllers/');
define('MODEL_PATH', ROOT_PATH . '/models/');
define('VIEW_PATH', ROOT_PATH . '/views/');

// Configuration des erreurs
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Fuseau horaire
date_default_timezone_set('Europe/Paris');
