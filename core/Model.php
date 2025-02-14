<?php
namespace App\core;

trait Model {
    protected $db;

    public function __construct($db) {
        $this->db = $db;
    }
}