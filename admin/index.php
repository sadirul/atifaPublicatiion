<?php
require_once '../class/class.user.php';
$user = new User();

if (!$user->isLogedin()) {
    $user->redirect('login.php');
    exit();
}

$user->query("SELECT 
    COUNT(*) AS totalOrder,
    SUM(CASE WHEN status = 'Pending' THEN 1 ELSE 0 END) AS pending,
    SUM(CASE WHEN status = 'Completed' THEN 1 ELSE 0 END) AS completed,
    SUM(CASE WHEN status = 'Cancelled' THEN 1 ELSE 0 END) AS cancelled
FROM orders");
$dashboardStats = $user->fetchOne();
?>
<?php include 'include/head.inc.php'; ?>
<?php include 'include/sidebar.inc.php'; ?>
<?php include 'include/header.inc.php'; ?>
<div class="clearfix"></div>

<div class="content-wrapper">
    <div class="container-fluid">

        <!--Start Dashboard Content-->

        <div class="row mt-3">
            <!-- Total Orders -->
            <div class="col-12 col-lg-6 col-xl-3">
                <div class="card gradient-bloody">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="media-body">
                                <p class="text-white">Total Orders</p>
                                <h4 class="text-white line-height-5"><?php echo $dashboardStats['totalOrder']; ?></h4>
                            </div>
                            <div class="w-circle-icon rounded-circle border border-white">
                                <i class="fa fa-shopping-cart text-white"></i> <!-- Changed icon -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Completed Orders -->
            <div class="col-12 col-lg-6 col-xl-3">
                <div class="card gradient-ohhappiness">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="media-body">
                                <p class="text-white">Completed</p>
                                <h4 class="text-white line-height-5"><?php echo $dashboardStats['completed']; ?></h4>
                            </div>
                            <div class="w-circle-icon rounded-circle border border-white">
                                <i class="fa fa-check-circle text-white"></i> <!-- Changed icon -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cancelled Orders -->
            <div class="col-12 col-lg-6 col-xl-3">
                <div class="card gradient-blooker">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="media-body">
                                <p class="text-white">Cancelled</p>
                                <h4 class="text-white line-height-5"><?php echo $dashboardStats['cancelled']; ?></h4>
                            </div>
                            <div class="w-circle-icon rounded-circle border border-white">
                                <i class="fa fa-times-circle text-white"></i> <!-- Changed icon -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Orders -->
            <div class="col-12 col-lg-6 col-xl-3">
                <div class="card gradient-scooter">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="media-body">
                                <p class="text-white">Pending</p>
                                <h4 class="text-white line-height-5"><?php echo $dashboardStats['pending']; ?></h4>
                            </div>
                            <div class="w-circle-icon rounded-circle border border-white">
                                <i class="fa fa-hourglass-half text-white"></i> <!-- Changed icon -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div><!--End Row-->
        <!--End Dashboard Content-->

    </div>
    <!-- End container-fluid-->

</div>


<?php include 'include/footer.inc.php'; ?>