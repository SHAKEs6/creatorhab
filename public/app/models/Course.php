<?php
class Course {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // Get all courses
    public function getCourses() {
        $this->db->query('SELECT * FROM courses ORDER BY created_at DESC');
        return $this->db->resultSet();
    }

    // Get course by ID
    public function getCourseById($id) {
        $this->db->query('SELECT * FROM courses WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }
}
