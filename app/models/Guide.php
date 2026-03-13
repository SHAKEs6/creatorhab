<?php
class Guide {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getGuides() {
        $this->db->query("SELECT * FROM guides ORDER BY created_at DESC");
        return $this->db->resultSet();
    }

    public function getGuideById($id) {
        $this->db->query("SELECT * FROM guides WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function addGuide($data) {
        $this->db->query("INSERT INTO guides (title, description, content, category, thumbnail) VALUES (:title, :description, :content, :category, :thumbnail)");
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':content', $data['content']);
        $this->db->bind(':category', $data['category']);
        $this->db->bind(':thumbnail', $data['thumbnail']);
        return $this->db->execute();
    }

    public function updateGuide($data) {
        $this->db->query("UPDATE guides SET title = :title, description = :description, content = :content, category = :category, thumbnail = :thumbnail WHERE id = :id");
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':content', $data['content']);
        $this->db->bind(':category', $data['category']);
        $this->db->bind(':thumbnail', $data['thumbnail']);
        return $this->db->execute();
    }

    public function deleteGuide($id) {
        $this->db->query("DELETE FROM guides WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

    public function searchGuides($query) {
        $this->db->query("SELECT * FROM guides WHERE title LIKE :query OR description LIKE :query OR category LIKE :query ORDER BY created_at DESC");
        $this->db->bind(':query', '%' . $query . '%');
        return $this->db->resultSet();
    }
}
