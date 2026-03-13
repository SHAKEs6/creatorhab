<?php
class Consultation {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // Get all consultations
    public function getConsultations() {
        $this->db->query('SELECT * FROM consultations ORDER BY price ASC');
        return $this->db->resultSet();
    }
}
