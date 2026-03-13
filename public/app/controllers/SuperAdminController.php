<?php
class SuperAdminController extends Controller {
    public function __construct() {
        if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'super_admin') {
            header('location: ' . URLROOT . '/auth/login');
            exit;
        }
    }

    public function index() {
        $data = [
            'title' => 'Super Admin Dashboard',
            'user' => [
                'name' => $_SESSION['user_name'],
                'email' => $_SESSION['user_email'],
                'role' => $_SESSION['user_role']
            ]
        ];

        $this->view('superadmin/index', $data);
    }
}
