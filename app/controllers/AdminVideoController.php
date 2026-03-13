<?php
class AdminVideoController extends Controller {
    private $videoModel;
    private $userModel;

    public function __construct() {
        $this->videoModel = $this->model('PageVideo');
        $this->userModel = $this->model('User');
        $this->checkAdminAccess();
    }

    private function checkAdminAccess() {
        if (!isset($_SESSION['user_id'])) {
            header('location: ' . URLROOT . '/auth/login');
            exit;
        }
        $user = $this->userModel->getUserById($_SESSION['user_id']);
        if (!$user || ($user->role !== 'admin' && $user->role !== 'super_admin')) {
            die('Access Denied: Admin privileges required');
        }
    }

    public function index() {
        $data = ['title' => 'Manage Page Videos'];
        $this->view('admin/manage_videos', $data);
    }

    public function addVideo() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $page_name = $_POST['page_name'] ?? '';
            $video_title = $_POST['video_title'] ?? '';
            $video_url = $_POST['video_url'] ?? '';
            $description = $_POST['description'] ?? '';
            
            // Extract video ID from YouTube URL
            $video_id = $this->extractYouTubeId($video_url);

            if (empty($page_name) || empty($video_title) || empty($video_url)) {
                $_SESSION['error'] = 'All fields are required';
                header('location: ' . URLROOT . '/admin---video/index');
                return;
            }

            $data = [
                'page_name' => $page_name,
                'video_title' => $video_title,
                'video_url' => $video_url,
                'video_id' => $video_id,
                'description' => $description,
                'created_by' => $_SESSION['user_id']
            ];

            if ($this->videoModel->addVideo($data)) {
                $_SESSION['success'] = "Video '$video_title' added to $page_name successfully";
                header('location: ' . URLROOT . '/admin-video/index');
            } else {
                $_SESSION['error'] = 'Failed to add video';
                header('location: ' . URLROOT . '/admin-video/index');
            }
        } else {
            header('location: ' . URLROOT . '/admin-video/index');
        }
    }

    public function deleteVideo($id = null) {
        if (!$id) {
            header('location: ' . URLROOT . '/admin-video/index');
            return;
        }

        if ($this->videoModel->deleteVideo($id)) {
            $_SESSION['success'] = 'Video deleted successfully';
        } else {
            $_SESSION['error'] = 'Failed to delete video';
        }

        header('location: ' . URLROOT . '/admin-video/index');
    }

    private function extractYouTubeId($url) {
        if (preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/live\/)([a-zA-Z0-9_-]+)/', $url, $match)) {
            return $match[1];
        }
        return null;
    }
}
