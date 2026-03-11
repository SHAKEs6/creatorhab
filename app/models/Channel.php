<?php
class Channel {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // Get all approved channels
    public function getApprovedChannels() {
        $this->db->query('SELECT * FROM channels WHERE status = "approved" ORDER BY created_at DESC');
        return $this->db->resultSet();
    }
}
