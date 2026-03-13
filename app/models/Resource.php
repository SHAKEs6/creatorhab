<?php
class Resource {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getResources() {
        $this->db->query("SELECT * FROM resources ORDER BY created_at DESC");
        return $this->db->resultSet();
    }

    public function getResourceById($id) {
        $this->db->query("SELECT * FROM resources WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function addResource($data) {
        $this->db->query("INSERT INTO resources (title, description, file_path, category) VALUES (:title, :description, :file_path, :category)");
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':file_path', $data['file_path']);
        $this->db->bind(':category', $data['category']);
        return $this->db->execute();
    }

    public function updateResource($data) {
        $this->db->query("UPDATE resources SET title = :title, description = :description, file_path = :file_path, category = :category WHERE id = :id");
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':file_path', $data['file_path']);
        $this->db->bind(':category', $data['category']);
        return $this->db->execute();
    }

    public function deleteResource($id) {
        $this->db->query("DELETE FROM resources WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}
