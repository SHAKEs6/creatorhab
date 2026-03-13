<?php
class Notification {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // Get user notifications
    public function getUserNotifications($user_id, $limit = 10) {
        $this->db->query("SELECT * FROM notifications WHERE user_id = :user_id ORDER BY created_at DESC LIMIT :limit");
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':limit', $limit, PDO::PARAM_INT);
        return $this->db->resultSet();
    }

    // Send notification
    public function sendNotification($data) {
        $this->db->query("INSERT INTO notifications (user_id, title, message, type) VALUES (:user_id, :title, :message, :type)");
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':message', $data['message']);
        $this->db->bind(':type', $data['type']);
        return $this->db->execute();
    }

    // Broadcast notification to multiple users
    public function broadcastNotification($data) {
        // Get all users or filtered users
        $query = "INSERT INTO notifications (user_id, title, message, type) ";
        if (isset($data['user_ids']) && is_array($data['user_ids'])) {
            foreach ($data['user_ids'] as $user_id) {
                $this->sendNotification([
                    'user_id' => $user_id,
                    'title' => $data['title'],
                    'message' => $data['message'],
                    'type' => $data['type']
                ]);
            }
            return true;
        }
        return false;
    }

    // Mark as read
    public function markAsRead($notification_id) {
        $this->db->query("UPDATE notifications SET is_read = 1 WHERE id = :id");
        $this->db->bind(':id', $notification_id);
        return $this->db->execute();
    }

    // Delete notification
    public function deleteNotification($notification_id) {
        $this->db->query("DELETE FROM notifications WHERE id = :id");
        $this->db->bind(':id', $notification_id);
        return $this->db->execute();
    }
}
