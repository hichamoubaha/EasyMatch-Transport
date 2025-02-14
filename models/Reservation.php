<?php
// File: models/Reservation.php

class Reservation
{
    private $db;
    private $table = 'reservations';

    public function __construct($db)
    {
        $this->db = $db;
    }

    // Add methods for reservation operations here
    // For example:
    public function createReservation($userId, $tripId)
    {
        $query = "INSERT INTO " . $this->table . " (user_id, trip_id, reservation_date) VALUES (:user_id, :trip_id, NOW())";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':trip_id', $tripId);
        return $stmt->execute();
    }

    // Add more methods as needed
}