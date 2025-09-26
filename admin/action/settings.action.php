<?php
require_once '../../class/class.user.php';
$user = new User();

if (!$user->isLogedin()) {
    $user->redirect('../login.php');
    exit();
}

if (isset($_POST['changePassword'])) {

    $current_password = trim($_POST['current_password']);
    $new_password     = trim($_POST['new_password']);
    $confirm_password = trim($_POST['confirm_password']);

    // Check if new passwords match
    if ($new_password !== $confirm_password) {
        $user->set_alert('New password and confirm password do not match.', 'error');
        $user->redirect('../settings.php'); // adjust path if needed
        exit();
    }

    // Get current user's password hash from DB
    $user_id = $user->sessionID(); // assuming you store logged in user ID in session
    $user->query("SELECT password FROM `admin` WHERE id = :id");
    $user->bind(":id", $user_id);
    $user->execute();
    $row = $user->fetchOne();

    if (!$row) {
        $user->set_alert('User not found.', 'error');
        $user->redirect('../settings.php');
        exit();
    }
    $current_password = $user->encrypt($current_password);
    // Verify current password
    if ($current_password !== $row['password']) {
        $user->set_alert('Current password is incorrect.', 'error');
        $user->redirect('../settings.php');
        exit();
    }

    // Hash new password
    $new_password_hash  = $user->encrypt($new_password);
    // Update password in database
    $user->query("UPDATE admin SET password = :password WHERE id = :id");
    $user->bind(":password", $new_password_hash);
    $user->bind(":id", $user_id);
    $user->execute();

    $user->set_alert('Password changed successfully.', 'success');
    $user->redirect('../settings.php');
    exit();
} else {
    $user->redirect('../settings.php');
    exit();
}
