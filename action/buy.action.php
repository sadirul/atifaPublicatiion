<?php
require_once '../class/class.user.php';

$user = new User();

header('Content-Type: application/json'); // return JSON always

function generateOrderID($prefix = 'ORD')
{
    $date = date('Ymd-His');
    $random = strtoupper(substr(bin2hex(random_bytes(2)), 0, 4));
    return $prefix . '-' . $date . '-' . $random;
}

if (isset($_POST['placeOrder']) && !empty($_POST['placeOrder'])) {
    try {
        $product_hash = $_POST['placeOrder'];

        // Validate product
        $user->query("SELECT * FROM products WHERE MD5(id) = :product_id");
        $user->bind(":product_id", $product_hash);
        $user->execute();

        if ($user->rowCount() == 0) {
            echo json_encode([
                "status" => "error",
                "message" => "Invalid product selected."
            ]);
            exit();
        }

        $product = $user->fetchOne();

        // Sanitize inputs
        $name     = trim($_POST['name'] ?? '');
        $email    = trim($_POST['email'] ?? '');
        $phone    = trim($_POST['mobile'] ?? '');
        $flat_no  = trim($_POST['flat_no'] ?? '');
        $city     = trim($_POST['city'] ?? '');
        $po       = trim($_POST['po'] ?? '');
        $ps       = trim($_POST['ps'] ?? '');
        $district = trim($_POST['district'] ?? '');
        $state    = trim($_POST['state'] ?? '');
        $pin      = trim($_POST['pin'] ?? '');
        $near     = trim($_POST['near'] ?? '');

        // Basic validation
        if (empty($name)) {
            echo json_encode(["status" => "error", "message" => "Name is required."]);
            exit();
        }

        if (empty($phone)) {
            echo json_encode(["status" => "error", "message" => "Mobile number is required."]);
            exit();
        }

        if (empty($flat_no) || empty($city) || empty($po) || empty($ps) || empty($district) || empty($state) || empty($pin)) {
            echo json_encode(["status" => "error", "message" => "All address fields are required (except Near)."]);
            exit();
        }

        $order_id = generateOrderID();

        // Insert order
        $user->query("INSERT INTO orders 
            (name, email, mobile, flat_no, city, po, ps, district, state, pin, near, product_id, qty, status, amount, total_amount, order_id) 
            VALUES 
            (:name, :email, :mobile, :flat_no, :city, :po, :ps, :district, :state, :pin, :near, :product_id, :qty, 'Pending', :amount, :total_amount, :order_id)");

        $user->bind(":name", $name);
        $user->bind(":email", $email ?: null);
        $user->bind(":mobile", $phone);
        $user->bind(":flat_no", $flat_no);
        $user->bind(":city", $city);
        $user->bind(":po", $po);
        $user->bind(":ps", $ps);
        $user->bind(":district", $district);
        $user->bind(":state", $state);
        $user->bind(":pin", $pin);
        $user->bind(":near", $near ?: null);
        $user->bind(":product_id", $product['id']);
        $user->bind(":qty", $_POST['qty'] ?? 1);
        $user->bind(":amount", $product['price']);
        $user->bind(":total_amount", $product['price'] * ($_POST['qty'] ?? 1));
        $user->bind(":order_id", $order_id);

        if ($user->execute()) {
            echo json_encode([
                "status" => "success",
                "message" => "Thank you for your order. You will receive a confirmation SMS and email shortly.",
                "order_id" => $order_id
            ]);
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "Failed to place order. Please try again."
            ]);
        }
    } catch (Exception $e) {
        echo json_encode([
            "status" => "error",
            "message" => "Error: " . $e->getMessage()
        ]);
    }
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Invalid request."
    ]);
}
