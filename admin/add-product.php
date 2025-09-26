<?php
require_once '../class/class.user.php';
$user = new User();

if (!$user->isLogedin()) {
    $user->redirect('login.php');
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
                <h4 class="page-title">Add Products</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javaScript:void();">Admin</a></li>
                    <li class="breadcrumb-item"><a href="javaScript:void();">Products</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Product</li>
                </ol>
            </div>
        </div>
        <!-- End Breadcrumb-->

        <div class="row">
            <div class="col-lg-6">
                <div class="card bg-light">
                    <div class="card-body">
                        <div class="card-title">Add Product</div>
                        <hr>
                        <?php echo $user->get_alert(); ?>
                        <form method="POST" action="action/product.action.php" enctype="multipart/form-data">
                            <!-- CSRF token if using Laravel -->
                            <div class="form-group">
                                <label for="product-title">Product Title</label>
                                <input type="text" class="form-control input-shadow bg-white"
                                    id="product-title" name="title"
                                    placeholder="Enter Product Title" required>
                            </div>

                            <div class="form-group">
                                <label for="product-description">Small Description</label>
                                <textarea required class="form-control input-shadow bg-white"
                                    id="product-description" name="description" rows="3"
                                    placeholder="Enter Product Description"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="full_description-product-description">Full Description</label>
                                <textarea required class="form-control input-shadow bg-white"
                                    id="full_description-product-description" name="full_description" rows="6"
                                    placeholder="Full Product Description"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="product-image">Product Image</label>
                                <input type="file" class="form-control input-shadow bg-white"
                                    id="product-image" name="image[]" multiple>
                            </div>

                            <div class="form-group">
                                <label for="product-price">Price</label>
                                <input type="number" step="0.01" class="form-control input-shadow bg-white"
                                    id="product-price" name="price"
                                    placeholder="Enter Product Price" required>
                            </div>

                            <div class="form-group">
                                <label for="product-del-price">Discount Price</label>
                                <input type="number" step="0.01" class="form-control input-shadow bg-white"
                                    id="product-del-price" name="del_price"
                                    placeholder="Enter Original/Del Price">
                            </div>
                            <input type="hidden" name="addProduct">
                            <div class="form-group">
                                <button type="submit" class="btn btn-dark shadow-dark px-5">
                                    <i class="zmdi zmdi-plus"></i> Add Product
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