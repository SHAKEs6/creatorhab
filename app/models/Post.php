<?php
class Post {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getPostsByLocation($location) {
        $this->db->query("SELECT * FROM posts WHERE page_location = :location ORDER BY created_at DESC");
        $this->db->bind(':location', $location);
        return $this->db->resultSet();
    }

    public function addPost($data) {
        $this->db->query("INSERT INTO posts (title, content, image, page_location) VALUES (:title, :content, :image, :page_location)");
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':content', $data['content']);
        $this->db->bind(':image', $data['image']);
        $this->db->bind(':page_location', $data['page_location']);
        return $this->db->execute();
    }
}
