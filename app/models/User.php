<?php
class User {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Find user by email
    public function findUserByEmail($email) {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->single();
        return $this->db->rowCount() > 0;
    }

    // Register user
    public function register($data) {
        $this->db->query('INSERT INTO users (name, email, password_hash) VALUES (:name, :email, :password)');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Login user
    public function login($email, $password) {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->single();

        if($row) {
            $hashed_password = $row->password_hash;
            if(password_verify($password, $hashed_password)) {
                return $row;
            }
        }
        return false;
    }

    // Get all users
    public function getUsers() {
        $this->db->query('SELECT * FROM users ORDER BY created_at DESC');
        return $this->db->resultSet();
    }

    // Get all users (alias)
    public function getAllUsers() {
        return $this->getUsers();
    }

    // Get user by ID
    public function getUserById($id) {
        $this->db->query('SELECT * FROM users WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    // Update user role
    public function updateUserRole($id, $role) {
        $this->db->query('UPDATE users SET role = :role WHERE id = :id');
        $this->db->bind(':role', $role);
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

    // Delete user
    public function deleteUser($id) {
        $this->db->query('DELETE FROM users WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

    // Update user profile
    public function updateProfile($data) {
        $this->db->query('UPDATE users SET name = :name, email = :email WHERE id = :id');
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        return $this->db->execute();
    }
}
