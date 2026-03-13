<?php
class Video {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getVideos() {
        // Return channel videos from YouTube
        return $this->getChannelVideos();
    }

    public function getTrendingVideos() {
        // Return channel videos - all videos from Faustin Shukranke
        return $this->getChannelVideos();
    }
    
    private function getChannelVideos() {
        // Return mock object for channel video feed
        return [
            (object)[
                'id' => 1,
                'title' => 'Faustin Shukranke - YouTube Channel',
                'youtube_id' => YOUTUBE_CHANNEL,
                'category' => 'Strategy',
                'is_trending' => true,
                'channel_feed' => true
            ]
        ];
    }

    public function addVideo($data) {
        $this->db->query("INSERT INTO videos (title, youtube_id, category, is_trending) VALUES (:title, :youtube_id, :category, :is_trending)");
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':youtube_id', $data['youtube_id']);
        $this->db->bind(':category', $data['category']);
        $this->db->bind(':is_trending', $data['is_trending']);
        return $this->db->execute();
    }

    public function deleteVideo($id) {
        $this->db->query("DELETE FROM videos WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

    // Get courses for a video
    public function getCoursesForVideo($videoId) {
        $this->db->query('SELECT c.* FROM courses c INNER JOIN course_videos cv ON c.id = cv.course_id WHERE cv.video_id = :video_id');
        $this->db->bind(':video_id', $videoId);
        return $this->db->resultSet();
    }
}
