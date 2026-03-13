<?php
class Product {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getProducts() {
        $this->db->query("SELECT * FROM products ORDER BY created_at DESC");
        return $this->db->resultSet();
    }

    public function getProductById($id) {
        $this->db->query("SELECT * FROM products WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function addProduct($data) {
        $this->db->query("INSERT INTO products (name, description, price, category, image) VALUES (:name, :description, :price, :category, :image)");
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':category', $data['category']);
        $this->db->bind(':image', $data['image']);
        return $this->db->execute();
    }

    public function updateProduct($data) {
        $this->db->query("UPDATE products SET name = :name, description = :description, price = :price, category = :category, image = :image WHERE id = :id");
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':category', $data['category']);
        $this->db->bind(':image', $data['image']);
        return $this->db->execute();
    }

    public function deleteProduct($id) {
        $this->db->query("DELETE FROM products WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

    public function searchProducts($query) {
        $this->db->query("SELECT * FROM products WHERE name LIKE :query OR description LIKE :query OR category LIKE :query ORDER BY created_at DESC");
        $this->db->bind(':query', '%' . $query . '%');
        return $this->db->resultSet();
    }
}
