<?php
class DashboardController extends Controller {
    public function __construct() {
        if(!isset($_SESSION['user_id'])) {
            header('location: ' . URLROOT . '/auth/login');
            exit;
        }
    }

    public function index() {
        if ($_SESSION['user_role'] === 'super_admin') {
            header('location: ' . URLROOT . '/superadmin');
            exit;
        } elseif ($_SESSION['user_role'] === 'admin') {
            header('location: ' . URLROOT . '/admin');
            exit;
        }

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
}
