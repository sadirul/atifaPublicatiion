<?php
require_once '../../class/class.user.php';
$user = new User();

if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $password = $user->encrypt($password);
    if($user->login($username, $password, 'admin')) {
        $user->redirect('../index.php');
    } else {
        $user->set_alert("Username or Password is incorrect.", 'error');
        $user->redirect('../login.php');
    }
} else {
    $user->redirect('../login.php');
}

