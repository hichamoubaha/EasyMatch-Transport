<?php
// File: bootstrap.php

define('PROJECT_ROOT', __DIR__);
define('CONFIG_PATH', PROJECT_ROOT . '/config/');
define('CONTROLLER_PATH', PROJECT_ROOT . '/controllers/');
define('MODEL_PATH', PROJECT_ROOT . '/models/');
define('VIEW_PATH', PROJECT_ROOT . '/views/');

// Function to safely require files
function safe_require_once($file) {
    if (file_exists($file)) {
        require_once $file;
    } else {
        error_log("File not found: $file");
    }
}

// Load configuration files
safe_require_once(CONFIG_PATH . 'config.php');
safe_require_once(CONFIG_PATH . 'Database.php');

// Load model files
safe_require_once(MODEL_PATH . 'User.php');
safe_require_once(MODEL_PATH . 'Trip.php');
safe_require_once(MODEL_PATH . 'Reservation.php');

// Load controller files
safe_require_once(CONTROLLER_PATH . 'UserController.php');
safe_require_once(CONTROLLER_PATH . 'TripController.php');
safe_require_once(CONTROLLER_PATH . 'ReservationController.php');