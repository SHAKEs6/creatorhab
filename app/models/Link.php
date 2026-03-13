<?php
class Link {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // Get all links for a content item
    public function getLinksByContent($content_id, $content_type) {
        $this->db->query("SELECT * FROM links WHERE content_id = :content_id AND content_type = :content_type ORDER BY created_at DESC");
        $this->db->bind(':content_id', $content_id);
        $this->db->bind(':content_type', $content_type);
        return $this->db->resultSet();
    }

    // Add link
    public function addLink($data) {
        $this->db->query("INSERT INTO links (content_id, content_type, title, url, is_visible, created_by) VALUES (:content_id, :content_type, :title, :url, :is_visible, :created_by)");
        $this->db->bind(':content_id', $data['content_id']);
        $this->db->bind(':content_type', $data['content_type']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':url', $data['url']);
        $this->db->bind(':is_visible', $data['is_visible']);
        $this->db->bind(':created_by', $data['created_by']);
        return $this->db->execute();
    }

    // Update link visibility
    public function updateLinkVisibility($link_id, $is_visible) {
        $this->db->query("UPDATE links SET is_visible = :is_visible WHERE id = :id");
        $this->db->bind(':id', $link_id);
        $this->db->bind(':is_visible', $is_visible);
        return $this->db->execute();
    }

    // Delete link
    public function deleteLink($link_id) {
        $this->db->query("DELETE FROM links WHERE id = :id");
        $this->db->bind(':id', $link_id);
        return $this->db->execute();
    }

    // Get visible links only
    public function getVisibleLinks($content_id, $content_type) {
        $this->db->query("SELECT * FROM links WHERE content_id = :content_id AND content_type = :content_type AND is_visible = 1 ORDER BY created_at DESC");
        $this->db->bind(':content_id', $content_id);
        $this->db->bind(':content_type', $content_type);
        return $this->db->resultSet();
    }
}
