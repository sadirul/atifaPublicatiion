<?php
require_once '../../class/class.user.php';
$user = new User();

if (isset($_GET['status']) && isset($_GET['id'])) {
    $status = $_GET['status'];
    $id = (int)$_GET['id'];

    if ($status === 'Completed' || $status === 'Cancelled' || $status === 'Approved' || $status === 'Rejected') {
        $user->query("UPDATE orders SET status = :status WHERE id = :id");
        $user->bind(':status', $status);
        $user->bind(':id', $id);
        if ($user->execute()) {
            $user->redirect('../orders.php');
        } else {
            $user->redirect('../orders.php');
        }
    } else {
        $user->redirect('../orders.php');
    }
} else {
    $user->redirect('../orders.php');
}
