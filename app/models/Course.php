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

    public function searchCourses($query) {
        $this->db->query("SELECT * FROM courses WHERE title LIKE :query OR description LIKE :query ORDER BY created_at DESC");
        $this->db->bind(':query', '%' . $query . '%');
        return $this->db->resultSet();
    }

    // Add video to course
    public function addVideoToCourse($courseId, $videoId) {
        $this->db->query('INSERT INTO course_videos (course_id, video_id) VALUES (:course_id, :video_id)');
        $this->db->bind(':course_id', $courseId);
        $this->db->bind(':video_id', $videoId);
        return $this->db->execute();
    }

    // Get videos for a course
    public function getVideosForCourse($courseId) {
        $this->db->query('SELECT v.* FROM videos v INNER JOIN course_videos cv ON v.id = cv.video_id WHERE cv.course_id = :course_id');
        $this->db->bind(':course_id', $courseId);
        return $this->db->resultSet();
    }
}
