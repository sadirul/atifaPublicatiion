<?php
require_once '../../class/class.user.php';
$user = new User();

if (isset($_POST['addProduct'])) {
    try {
        // Validate required fields
        $requiredFields = [
            'title' => 'Product title is required.',
            'description' => 'Product description is required.',
            'price' => 'Product price is required.',
            'del_price' => 'Product del price is required.'
        ];

        foreach ($requiredFields as $field => $errorMessage) {
            if (!isset($_POST[$field]) || empty(trim($_POST[$field]))) {
                $user->set_alert($errorMessage, 'error');
                $user->back();
                return; // exit current function or script
            }
        }

        // Validate image
        if (!isset($_FILES['image']) || empty($_FILES['image']['tmp_name'])) {
            $user->set_alert("Product image is required.", 'error');
            $user->back();
            return;
        }

        // Upload image
        $upload = $user->file_upload($_FILES['image'], ['jpg', 'jpeg', 'png'], '../../assets/uploads/products');
        if ($upload['status'] !== 'success') {
            $user->set_alert("Image upload failed: " . $upload['msg'], 'error');
            $user->back();
            return;
        }
        $image = $upload['file_name'];

        // Insert into DB
        $user->query("INSERT INTO products (title, description, full_description, image, price, del_price) 
                      VALUES (:title, :description, :full_description, :image, :price, :del_price)");
        $user->bind(':title', trim($_POST['title']));
        $user->bind(':description', trim($_POST['description']));
        $user->bind(':full_description', trim($_POST['full_description']));
        $user->bind(':price', trim($_POST['price']));
        $user->bind(':del_price', trim($_POST['del_price']));
        $user->bind(':image', $image);

        if ($user->execute()) {
            $user->set_alert("Product added successfully.", 'success');
            $user->redirect('../add-product.php');
        } else {
            $user->set_alert("Something went wrong. Please try again.", 'error');
            $user->back();
        }
    } catch (Exception $e) {
        $user->set_alert($e->getMessage(), 'error');
        $user->back();
    }
}

if (isset($_GET['deleteProduct'], $_GET['product_id'])) {
    $product_id = (int)$_GET['product_id'];
    if ($product_id <= 0) {
        $user->set_alert("Invalid product ID.", 'error');
        $user->back();
        return;
    }

    // Fetch product to get image filename
    $user->query("SELECT image FROM products WHERE id = :id");
    $user->bind(':id', $product_id);
    $product = $user->fetchOne();

    if (!$product) {
        $user->set_alert("Product not found.", 'error');
        $user->back();
        return;
    }

    // Delete product from DB
    $user->query("DELETE FROM products WHERE id = :id");
    $user->bind(':id', $product_id);

    if ($user->execute()) {
        // Delete image file
        $imagePath = '../../assets/uploads/products/' . $product['image'];
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        $user->set_alert("Product deleted successfully.", 'success');
        $user->redirect('../products.php');
    } else {
        $user->set_alert("Failed to delete product. Please try again.", 'error');
        $user->back();
    }
}

if (isset($_POST['editProduct'])) {
    try {
        // Validate required fields
        $requiredFields = [
            'product_id' => 'Invalid product ID.',
            'title' => 'Product title is required.',
            'description' => 'Product description is required.',
            'price' => 'Product price is required.',
            'del_price' => 'Product del price is required.'
        ];

        foreach ($requiredFields as $field => $errorMessage) {
            if (!isset($_POST[$field]) || empty(trim($_POST[$field]))) {
                $user->set_alert($errorMessage, 'error');
                $user->back();
                return; // exit current function or script
            }
        }

        $product_id = intval($_POST['product_id']);

        // Fetch existing product
        $user->query("SELECT * FROM products WHERE id = :id");
        $user->bind(':id', $product_id);
        $product = $user->fetchOne();

        if (!$product) {
            $user->set_alert("Product not found.", 'error');
            $user->back();
            return;
        }

        $image = $product['image']; // Keep old image by default

        // Upload new image if provided
        if (isset($_FILES['image']) && !empty($_FILES['image']['tmp_name'])) {
            $upload = $user->file_upload($_FILES['image'], ['jpg', 'jpeg', 'png'], '../../assets/uploads/products');
            if ($upload['status'] !== 'success') {
                $user->set_alert("Image upload failed: " . $upload['msg'], 'error');
                $user->back();
                return;
            }
            $image = $upload['file_name'];

            // Optionally, delete old image file
            if (!empty($product['image']) && file_exists('../../assets/uploads/products/' . $product['image'])) {
                unlink('../../assets/uploads/products/' . $product['image']);
            }
        }

        // Update product in DB
        $user->query("UPDATE products SET title = :title, description = :description, full_description = :full_description, price = :price, del_price = :del_price, image = :image WHERE id = :id");
        $user->bind(':title', trim($_POST['title']));
        $user->bind(':description', trim($_POST['description']));
        $user->bind(':full_description', trim($_POST['full_description']));
        $user->bind(':price', trim($_POST['price']));
        $user->bind(':del_price', trim($_POST['del_price']));
        $user->bind(':image', $image);
        $user->bind(':id', $product_id);

        if ($user->execute()) {
            $user->set_alert("Product updated successfully.", 'success');
            $user->redirect('../edit-product.php?id=' . $product_id);
        } else {
            $user->set_alert("Something went wrong. Please try again.", 'error');
            $user->back();
        }
    } catch (Exception $e) {
        $user->set_alert($e->getMessage(), 'error');
        $user->back();
    }
}
