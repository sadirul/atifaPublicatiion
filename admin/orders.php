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
                            <?php
                            // Count total orders
                            $user->query("SELECT COUNT(id) AS cnt FROM orders");
                            $user->execute();
                            $totalRow = $user->fetchOne()['cnt'];

                            // Set pagination: 50 orders per page
                            $page = $user->pagination(100, $totalRow);

                            // Fetch paginated orders with product info
                            $sql = "SELECT orders.*, products.*, orders.id as order_id 
                            FROM orders 
                            LEFT JOIN products ON orders.product_id = products.id 
                            ORDER BY orders.id DESC 
                            LIMIT {$page->offset}, {$page->limit}";

                            $user->query($sql);
                            $user->execute();
                            $orders = $user->fetchAll();
                            $total_leads_show = $user->rowCount();
                            ?>

                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Total Price</th>
                                        <th scope="col">User Info</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($orders as $index => $order): ?>
                                        <tr>
                                            <th scope="row"><?php echo $page->offset + $index + 1; ?></th>
                                            <td><img src="../assets/uploads/products/<?php echo $order['image']; ?>" alt="<?php echo $order['title']; ?>" width="50"></td>
                                            <td><?php echo $order['title']; ?></td>
                                            <td>₹<?php echo $order['price']; ?></td>
                                            <td><?php echo $order['qty']; ?></td>
                                            <td>₹<?php echo number_format($order['total_amount'], 2); ?></td>
                                            <td>
                                                <strong>Name</strong>: <?php echo htmlspecialchars($order['name']); ?><br>
                                                <strong>Mobile</strong>:
                                                <a href="tel:<?php echo htmlspecialchars($order['mobile']); ?>" style="white-space: nowrap;">
                                                    <?php echo htmlspecialchars($order['mobile']); ?>
                                                </a><br>
                                                <?php if (!empty($order['flat_no'])) : ?>
                                                    <strong>Flat No: </strong> <?php echo htmlspecialchars($order['flat_no']); ?><br>
                                                <?php endif; ?>
                                                <strong>City: </strong> <?php echo htmlspecialchars($order['city']); ?><br>
                                                <strong>Post: </strong> <?php echo htmlspecialchars($order['po']); ?><br>
                                                <strong>PS: </strong> <?php echo htmlspecialchars($order['ps']); ?><br>
                                                <strong>District: </strong> <?php echo htmlspecialchars($order['district']); ?><br>
                                                <strong>State: </strong> <?php echo htmlspecialchars($order['state']); ?><br>
                                                <strong>PIN: </strong> <?php echo htmlspecialchars($order['pin']); ?><br>
                                                <?php if (!empty($order['near'])) : ?>
                                                    <strong>Near: </strong> <?php echo htmlspecialchars($order['near']); ?><br>
                                                <?php endif; ?>
                                                <hr />
                                                <strong>Date: </strong><?php echo $user->dateFormat('d M Y | h:i:s a', htmlspecialchars($order['created_at'])); ?>
                                            </td>

                                            <td class="space-x-2">
                                                <?php if ($order['status'] === 'Pending') : ?>
                                                    <a href="action/order-status.action.php?status=Completed&id=<?php echo (int)$order['order_id']; ?>"
                                                        class="btn btn-sm btn-success"
                                                        title="Completed"
                                                        onclick="return confirm('Are you sure you want to mark this order as Completed?');">
                                                        <i class="fa fa-check"></i>
                                                    </a>

                                                    <a href="action/order-status.action.php?status=Cancelled&id=<?php echo (int)$order['order_id']; ?>"
                                                        class="btn btn-sm btn-danger"
                                                        title="Cancelled"
                                                        onclick="return confirm('Are you sure you want to Cancel this order?');">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                <?php else : ?>
                                                    <?php if ($order['status'] === 'Completed') : ?>
                                                        <span class="btn btn-sm btn-success disabled"><?php echo $order['status']; ?></span>
                                                    <?php elseif ($order['status'] === 'Cancelled') : ?>
                                                        <span class="btn btn-sm btn-danger disabled"><?php echo $order['status']; ?></span>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                            <!-- Pagination -->
                            <?php include('component/pagination.php'); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--End Row-->

    </div>
</div>

<?php include 'include/footer.inc.php'; ?>