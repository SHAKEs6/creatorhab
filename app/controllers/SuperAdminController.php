<?php
class SuperAdminController extends Controller {
    protected $userModel;
    protected $notificationModel;

    public function __construct() {
        if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'super_admin') {
            header('location: ' . URLROOT . '/auth/login');
            exit;
        }
        $this->userModel = $this->model('User');
        $this->notificationModel = $this->model('Notification');
    }

    public function index() {
        $data = [
            'title' => 'Super Admin Dashboard',
            'users_count' => count($this->userModel->getUsers()),
            'admins_count' => count(array_filter($this->userModel->getUsers(), function($u) { return $u->role === 'admin'; }))
        ];
        $this->view('superadmin/index', $data);
    }

    // User Management
    public function users() {
        $users = $this->userModel->getUsers();
        $this->view('superadmin/users/index', ['users' => $users]);
    }

    public function update_role($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $role = $_POST['role'];
            if ($this->userModel->updateRole($id, $role)) {
                // Send notification to user
                $user = $this->userModel->getUserById($id);
                $this->notificationModel->sendNotification([
                    'user_id' => $id,
                    'title' => 'Role Updated',
                    'message' => 'Your account role has been updated to: ' . ucfirst($role),
                    'type' => 'info'
                ]);
                header('location: ' . URLROOT . '/superadmin/users');
            }
        }
    }

    public function delete_user($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->userModel->deleteUser($id)) {
                header('location: ' . URLROOT . '/superadmin/users');
            }
        }
    }

    // Send notification to users
    public function send_notification() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!isset($_POST['csrf_token']) || !verify_csrf_token($_POST['csrf_token'])) {
                die('CSRF token validation failed');
            }

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $recipient_type = $_POST['recipient_type']; // 'all', 'admins', 'users'
            $title = trim($_POST['title']);
            $message = trim($_POST['message']);

            // Get recipient user IDs
            $users = $this->userModel->getUsers();
            $user_ids = [];

            foreach ($users as $user) {
                if ($recipient_type === 'all') {
                    $user_ids[] = $user->id;
                } elseif ($recipient_type === 'admins' && ($user->role === 'admin' || $user->role === 'super_admin')) {
                    $user_ids[] = $user->id;
                } elseif ($recipient_type === 'users' && $user->role === 'user') {
                    $user_ids[] = $user->id;
                }
            }

            // Send notifications
            foreach ($user_ids as $user_id) {
                $this->notificationModel->sendNotification([
                    'user_id' => $user_id,
                    'title' => $title,
                    'message' => $message,
                    'type' => 'announcement'
                ]);
            }

            header('location: ' . URLROOT . '/superadmin');
        } else {
            $this->view('superadmin/send_notification');
        }
    }
}
