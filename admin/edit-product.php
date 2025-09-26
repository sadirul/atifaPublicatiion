<?php
require_once '../class/class.user.php';
$user = new User();

if (!$user->isLogedin()) {
    $user->redirect('login.php');
    exit();
}

// Get product ID from URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    $user->set_alert("Invalid Product ID.", 'error');
    $user->redirect('products.php');
    exit();
}

$product_id = intval($_GET['id']);

// Fetch product data
$user->query("SELECT * FROM products WHERE id = :id");
$user->bind(':id', $product_id);
$product = $user->fetchOne(); // You need to implement this method in your User class
if (!$product) {
    $user->set_alert("Product not found.", 'error');
    $user->redirect('products.php');
    exit();
}
?>
<?php include 'include/head.inc.php'; ?>
<?php include 'include/sidebar.inc.php'; ?>
<?php include 'include/header.inc.php'; ?>
<div class="clearfix"></div>

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumb-->
        <div class="row pt-2 pb-2">
            <div class="col-sm-9">
                <h4 class="page-title">Edit Product</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javaScript:void();">Admin</a></li>
                    <li class="breadcrumb-item"><a href="products.php">Products</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
                </ol>
            </div>
        </div>
        <!-- End Breadcrumb-->

        <div class="row">
            <div class="col-lg-6">
                <div class="card bg-light">
                    <div class="card-body">
                        <div class="card-title">Edit Product</div>
                        <hr>
                        <?php echo $user->get_alert(); ?>
                        <form method="POST" action="action/product.action.php" enctype="multipart/form-data">
                            <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                            <input type="hidden" name="editProduct">

                            <div class="form-group">
                                <label for="product-title">Product Title</label>
                                <input type="text" class="form-control input-shadow bg-white"
                                    id="product-title" name="title"
                                    placeholder="Enter Product Title"
                                    value="<?php echo htmlspecialchars($product['title']); ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="product-description">Small Description</label>
                                <textarea class="form-control input-shadow bg-white"
                                    id="product-description" name="description" rows="3"
                                    placeholder="Enter Product Description" required><?php echo htmlspecialchars($product['description']); ?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="full-product-description">Full Description</label>
                                <textarea class="form-control input-shadow bg-white"
                                    id="full-product-description" name="full_description" rows="6"
                                    placeholder="Full Product Description" required><?php echo htmlspecialchars($product['full_description']); ?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="product-image">Product Image</label>
                                <input type="file" class="form-control input-shadow bg-white"
                                    id="product-image" name="image">
                                <small class="text-muted">Leave blank if you don't want to change the image</small>
                                <?php if (!empty($product['image'])): ?>
                                    <div class="mb-2">
                                        <img src="../assets/uploads/products/<?php echo $product['image']; ?>" alt="Product Image" style="max-width:100px;">
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                <label for="product-price">Price</label>
                                <input type="number" step="0.01" class="form-control input-shadow bg-white"
                                    id="product-price" name="price"
                                    placeholder="Enter Product Price"
                                    value="<?php echo htmlspecialchars($product['price']); ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="product-del-price">Discount Price</label>
                                <input type="number" step="0.01" class="form-control input-shadow bg-white"
                                    id="product-del-price" name="del_price"
                                    placeholder="Enter Original/Del Price"
                                    value="<?php echo htmlspecialchars($product['del_price']); ?>">
                            </div>
                            <input type="hidden" name="editProduct">
                            <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                            <div class="form-group">
                                <button type="submit" class="btn btn-dark shadow-dark px-5">
                                    <i class="zmdi zmdi-edit"></i> Update Product
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!--End Row-->

    </div>
</div>

<?php include 'include/footer.inc.php'; ?>