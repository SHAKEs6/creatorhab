<?php
class AdminUsersController extends Controller {
    private $userModel;

    public function __construct() {
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
        $users = $this->userModel->getAllUsers();
        $data = [
            'title' => 'Manage Users',
            'users' => $users
        ];
        $this->view('admin/manage_users', $data);
    }

    public function updateRole() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user_id = $_POST['user_id'] ?? 0;
            $role = $_POST['role'] ?? 'user';

            if (!in_array($role, ['user', 'admin', 'super_admin'])) {
                $_SESSION['error'] = 'Invalid role';
                header('location: ' . URLROOT . '/admin-users/index');
                return;
            }

            if ($this->userModel->updateUserRole($user_id, $role)) {
                $_SESSION['success'] = "User role updated to $role";
            } else {
                $_SESSION['error'] = 'Failed to update role';
            }
        }

        header('location: ' . URLROOT . '/admin-users/index');
    }

    public function deleteUser($id = null) {
        if (!$id) {
            header('location: ' . URLROOT . '/admin-users/index');
            return;
        }

        if ($id == $_SESSION['user_id']) {
            $_SESSION['error'] = 'Cannot delete yourself';
            header('location: ' . URLROOT . '/admin-users/index');
            return;
        }

        if ($this->userModel->deleteUser($id)) {
            $_SESSION['success'] = 'User deleted successfully';
        } else {
            $_SESSION['error'] = 'Failed to delete user';
        }

        header('location: ' . URLROOT . '/admin-users/index');
    }
}
