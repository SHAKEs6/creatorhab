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
    // Search channels
    public function searchChannels($query) {
        $this->db->query("SELECT * FROM channels WHERE status = 'approved' AND (name LIKE :query OR niche LIKE :query OR description LIKE :query) ORDER BY created_at DESC");
        $this->db->bind(':query', '%' . $query . '%');
        return $this->db->resultSet();
    }
}
