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
                <h4 class="page-title">All Products</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javaScript:void();">Admin</a></li>
                    <li class="breadcrumb-item"><a href="javaScript:void();">Products</a></li>
                    <li class="breadcrumb-item active" aria-current="page">All Product</li>
                </ol>
            </div>
        </div>
        <!-- End Breadcrumb-->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <?php echo $user->get_alert(); ?>
                    <div class="card-header text-uppercase text-dark">All Products</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Del Price</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $user->query("
    SELECT p.*, 
           (SELECT image 
            FROM product_images 
            WHERE product_id = p.id 
            ORDER BY id ASC 
            LIMIT 1) AS first_image
    FROM products p
");
                                    $products = $user->fetchAll();
                                    foreach ($products as $index => $product):
                                    ?>
                                        <tr>
                                            <th scope="row"><?php echo ++$index; ?></th>
                                            <td>
                                                <?php if (!empty($product['first_image'])): ?>
                                                    <img src="../assets/uploads/products/<?php echo $product['first_image']; ?>"
                                                        alt="<?php echo htmlspecialchars($product['title']); ?>" width="50">
                                                <?php else: ?>
                                                    <span>No image</span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo htmlspecialchars($product['title']); ?></td>
                                            <td><?php echo htmlspecialchars($product['price']); ?></td>
                                            <td><?php echo htmlspecialchars($product['del_price']); ?></td>
                                            <td>
                                                <a href="edit-product.php?id=<?php echo (int)$product['id']; ?>" class="btn btn-sm btn-primary" title="Edit">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="action/product.action.php?deleteProduct&product_id=<?php echo (int)$product['id']; ?>"
                                                    class="btn btn-sm btn-danger"
                                                    title="Delete"
                                                    onclick="return confirm('Are you sure you want to delete this product?');">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--End Row-->

    </div>
</div>

<?php include 'include/footer.inc.php'; ?>