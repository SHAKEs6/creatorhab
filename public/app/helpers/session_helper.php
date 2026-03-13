<?php
/**
 * Session Helper Functions
 * Includes CSRF Protection and Flash Messaging
 */
session_start();

// Generate CSRF Token
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

function csrf_token() {
    return $_SESSION['csrf_token'];
}

function verify_csrf_token($token) {
    if (isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token)) {
        return true;
    }
    return false;
}

// Flash message helper
// EXAMPLE: flash('register_success', 'You are now registered and can log in');
// DISPLAY IN VIEW: echo flash('register_success');
function flash($name = '', $message = '', $class = 'alert alert-success') {
    if (!empty($name)) {
        if (!empty($message) && empty($_SESSION[$name])) {
            if (!empty($_SESSION[$name])) {
                unset($_SESSION[$name]);
            }
            if (!empty($_SESSION[$name . '_class'])) {
                unset($_SESSION[$name . '_class']);
            }
            $_SESSION[$name] = $message;
            $_SESSION[$name . '_class'] = $class;
        } elseif (empty($message) && !empty($_SESSION[$name])) {
            $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : '';
            $msg = $_SESSION[$name];
            unset($_SESSION[$name]);
            unset($_SESSION[$name . '_class']);
            return '<div class="' . $class . '" id="msg-flash" style="padding: 1rem; margin-bottom: 1rem; border-radius: var(--radius-sm); border: 1px solid rgba(255,255,255,0.1); background: rgba(0,0,0,0.5); text-align: center;">' . $msg . '</div>';
        }
    }
}
