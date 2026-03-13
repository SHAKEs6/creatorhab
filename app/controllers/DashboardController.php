<?php
class DashboardController extends Controller {
    protected $userModel;

    public function __construct() {
        if(!isset($_SESSION['user_id'])) {
            header('location: ' . URLROOT . '/auth/login');
            exit;
        }
        $this->userModel = $this->model('User');
    }

    public function index() {
        // Allow all authenticated users to view their dashboard
        // Admins and super_admins can access both their dashboard and admin panel
        
        $data = [
            'title' => 'Creator Dashboard',
            'user' => [
                'name' => $_SESSION['user_name'],
                'email' => $_SESSION['user_email'],
                'role' => $_SESSION['user_role']
            ],
            // Placeholders for database results
            'stats' => [
                'channels' => 0,
                'courses' => 0,
                'tools_used' => 0
            ]
        ];

        $this->view('dashboard/index', $data);
    }

    public function edit_profile() {
        $user = $this->userModel->getUserById($_SESSION['user_id']);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!isset($_POST['csrf_token']) || !verify_csrf_token($_POST['csrf_token'])) {
                die('CSRF token validation failed');
            }

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => $_SESSION['user_id'],
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'name_err' => '',
                'email_err' => ''
            ];

            // Validate Name
            if (empty($data['name'])) {
                $data['name_err'] = 'Please enter name';
            }

            // Validate Email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            }
            else {
                // Check if email is already taken by another user
                $existingUser = $this->userModel->findUserByEmail($data['email']);
                if ($existingUser && $existingUser->id != $_SESSION['user_id']) {
                    $data['email_err'] = 'Email is already taken';
                }
            }

            // Make sure errors are empty
            if (empty($data['name_err']) && empty($data['email_err'])) {
                // Update Profile
                if ($this->userModel->updateProfile($data)) {
                    $_SESSION['user_name'] = $data['name'];
                    $_SESSION['user_email'] = $data['email'];
                    header('location: ' . URLROOT . '/dashboard');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('dashboard/edit_profile', $data);
            }
        } else {
            $data = [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'name_err' => '',
                'email_err' => ''
            ];

            $this->view('dashboard/edit_profile', $data);
        }
    }

    // API endpoint to fetch user notifications
    public function api_notifications() {
        header('Content-Type: application/json');
        
        if (!isset($_SESSION['user_id'])) {
            http_response_code(401);
            echo json_encode(['error' => 'Unauthorized']);
            exit;
        }

        $notificationModel = $this->model('Notification');
        $notifications = $notificationModel->getUserNotifications($_SESSION['user_id']);
        
        echo json_encode([
            'success' => true,
            'notifications' => $notifications,
            'unread_count' => count(array_filter($notifications, function($n) { return !$n->is_read; }))
        ]);
    }

    // API endpoint to mark notification as read
    public function api_mark_notification_read() {
        header('Content-Type: application/json');
        
        if (!isset($_SESSION['user_id'])) {
            http_response_code(401);
            echo json_encode(['error' => 'Unauthorized']);
            exit;
        }

        $data = json_decode(file_get_contents("php://input"), true);
        $notification_id = $data['notification_id'] ?? null;

        if (!$notification_id) {
            http_response_code(400);
            echo json_encode(['error' => 'Invalid notification ID']);
            exit;
        }

        $notificationModel = $this->model('Notification');
        $result = $notificationModel->markAsRead($notification_id);

        echo json_encode([
            'success' => $result,
            'message' => $result ? 'Notification marked as read' : 'Failed to mark as read'
        ]);
    }

    // API endpoint to register for push notifications
    public function api_register_push() {
        header('Content-Type: application/json');
        
        if (!isset($_SESSION['user_id'])) {
            http_response_code(401);
            echo json_encode(['error' => 'Unauthorized']);
            exit;
        }

        $data = json_decode(file_get_contents("php://input"), true);
        $subscription = $data['subscription'] ?? null;

        if (!$subscription) {
            http_response_code(400);
            echo json_encode(['error' => 'Invalid subscription']);
            exit;
        }

        // Store push subscription in session or database for future use
        $_SESSION['push_subscription'] = json_encode($subscription);

        echo json_encode([
            'success' => true,
            'message' => 'Push notifications enabled'
        ]);
    }

    // API endpoint to delete notification
    public function api_delete_notification() {
        header('Content-Type: application/json');
        
        if (!isset($_SESSION['user_id'])) {
            http_response_code(401);
            echo json_encode(['error' => 'Unauthorized']);
            exit;
        }

        $data = json_decode(file_get_contents("php://input"), true);
        $notification_id = $data['notification_id'] ?? null;

        if (!$notification_id) {
            http_response_code(400);
            echo json_encode(['error' => 'Invalid notification ID']);
            exit;
        }

        $notificationModel = $this->model('Notification');
        $result = $notificationModel->deleteNotification($notification_id);

        echo json_encode([
            'success' => $result,
            'message' => $result ? 'Notification deleted' : 'Failed to delete notification'
        ]);
    }
}
