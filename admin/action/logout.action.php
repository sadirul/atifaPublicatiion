<?php
require_once '../../class/class.user.php';
$user = new User();

$user->logout();
$user->redirect('../login.php');

