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
                return;
            }
        }

        // Validate images
        if (!isset($_FILES['image']) || empty($_FILES['image']['tmp_name'][0])) {
            $user->set_alert("At least one product image is required.", 'error');
            $user->back();
            return;
        }

        // Insert main product first
        $embed_link = $user->YouTubeID($_POST['embed_link']);
        $user->query("INSERT INTO products (title, description, full_description, price, del_price, embed_link) 
                      VALUES (:title, :description, :full_description, :price, :del_price, :embed_link)");
        $user->bind(':title', trim($_POST['title']));
        $user->bind(':description', trim($_POST['description']));
        $user->bind(':full_description', trim($_POST['full_description']));
        $user->bind(':price', trim($_POST['price']));
        $user->bind(':del_price', trim($_POST['del_price']));
        $user->bind(':embed_link', $embed_link);

        if ($user->execute()) {
            $productId = $user->insertID();

            // Upload multiple images
            foreach ($_FILES['image']['tmp_name'] as $key => $tmpName) {
                if (!empty($tmpName)) {
                    $file = [
                        'name' => $_FILES['image']['name'][$key],
                        'type' => $_FILES['image']['type'][$key],
                        'tmp_name' => $_FILES['image']['tmp_name'][$key],
                        'error' => $_FILES['image']['error'][$key],
                        'size' => $_FILES['image']['size'][$key],
                    ];

                    $upload = $user->file_upload($file, ['jpg', 'jpeg', 'png'], '../../assets/uploads/products');

                    if ($upload['status'] === 'success') {
                        $imageName = $upload['file_name'];

                        // Insert into product_images table
                        $user->query("INSERT INTO product_images (product_id, image) VALUES (:product_id, :image)");
                        $user->bind(':product_id', $productId);
                        $user->bind(':image', $imageName);
                        $user->execute();
                    }
                }
            }

            $user->set_alert("Product added successfully with images.", 'success');
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
                return;
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

        // Update product details
        $embed_link = $user->YouTubeID($_POST['embed_link']);
        $user->query("UPDATE products 
                      SET title = :title, description = :description, 
                          full_description = :full_description, 
                          price = :price, 
                          del_price = :del_price,
                          embed_link = :embed_link
                      WHERE id = :id");
        $user->bind(':title', trim($_POST['title']));
        $user->bind(':description', trim($_POST['description']));
        $user->bind(':full_description', trim($_POST['full_description']));
        $user->bind(':price', trim($_POST['price']));
        $user->bind(':del_price', trim($_POST['del_price']));
        $user->bind(':embed_link', $embed_link);
        $user->bind(':id', $product_id);
        $user->execute();

        // Handle multiple new image uploads (keep old ones as is)
        if (isset($_FILES['images']) && !empty($_FILES['images']['name'][0])) {
            foreach ($_FILES['images']['name'] as $key => $name) {
                if (!empty($_FILES['images']['tmp_name'][$key])) {
                    $fileArray = [
                        'name' => $_FILES['images']['name'][$key],
                        'type' => $_FILES['images']['type'][$key],
                        'tmp_name' => $_FILES['images']['tmp_name'][$key],
                        'error' => $_FILES['images']['error'][$key],
                        'size' => $_FILES['images']['size'][$key],
                    ];

                    $upload = $user->file_upload($fileArray, ['jpg', 'jpeg', 'png'], '../../assets/uploads/products');
                    if ($upload['status'] === 'success') {
                        $file_name = $upload['file_name'];

                        // Insert new image into product_images table
                        $user->query("INSERT INTO product_images (product_id, image) VALUES (:product_id, :image)");
                        $user->bind(':product_id', $product_id);
                        $user->bind(':image', $file_name);
                        $user->execute();
                    }
                }
            }
        }

        $user->set_alert("Product updated successfully.", 'success');
        $user->redirect('../edit-product.php?id=' . $product_id);
    } catch (Exception $e) {
        $user->set_alert($e->getMessage(), 'error');
        $user->back();
    }
}

// Additional code for deleting individual images can be added here if needed
// DELETE product image
if (isset($_GET['deleteImage'])) {
    try {
        $image_id   = intval($_GET['id']);
        $product_id = intval($_GET['product_id']);

        if (!$image_id || !$product_id) {
            $user->set_alert("Invalid image or product ID.", "error");
            $user->back();
            exit;
        }

        // Fetch image details
        $user->query("SELECT * FROM product_images WHERE id = :id AND product_id = :product_id");
        $user->bind(':id', $image_id);
        $user->bind(':product_id', $product_id);
        $image = $user->fetchOne();

        if (!$image) {
            $user->set_alert("Image not found.", "error");
            $user->redirect("../edit-product.php?id=" . $product_id);
            exit;
        }

        // Delete file from server
        $filePath = "../../assets/uploads/products/" . $image['image'];
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        // Delete record from DB
        $user->query("DELETE FROM product_images WHERE id = :id AND product_id = :product_id");
        $user->bind(':id', $image_id);
        $user->bind(':product_id', $product_id);
        $user->execute();

        $user->set_alert("Image deleted successfully.", "success");
        $user->redirect("../edit-product.php?id=" . $product_id);
    } catch (Exception $e) {
        $user->set_alert("Error: " . $e->getMessage(), "error");
        $user->back();
    }
}
