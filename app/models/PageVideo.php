<?php
class PageVideo {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getVideosByPage($page_name) {
        $this->db->query('SELECT * FROM page_videos WHERE page_name = :page_name ORDER BY order_num ASC');
        $this->db->bind(':page_name', $page_name);
        return $this->db->resultSet();
    }

    public function addVideo($data) {
        $this->db->query('INSERT INTO page_videos (page_name, video_title, video_url, video_id, description, created_by) 
                         VALUES (:page_name, :video_title, :video_url, :video_id, :description, :created_by)');
        $this->db->bind(':page_name', $data['page_name']);
        $this->db->bind(':video_title', $data['video_title']);
        $this->db->bind(':video_url', $data['video_url']);
        $this->db->bind(':video_id', $data['video_id'] ?? null);
        $this->db->bind(':description', $data['description'] ?? '');
        $this->db->bind(':created_by', $data['created_by'] ?? 1);
        return $this->db->execute();
    }

    public function deleteVideo($id) {
        $this->db->query('DELETE FROM page_videos WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

    public function updateVideo($data) {
        $this->db->query('UPDATE page_videos SET video_title = :video_title, video_url = :video_url, 
                         video_id = :video_id, description = :description, order_num = :order_num 
                         WHERE id = :id');
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':video_title', $data['video_title']);
        $this->db->bind(':video_url', $data['video_url']);
        $this->db->bind(':video_id', $data['video_id'] ?? null);
        $this->db->bind(':description', $data['description'] ?? '');
        $this->db->bind(':order_num', $data['order_num'] ?? 0);
        return $this->db->execute();
    }
}
