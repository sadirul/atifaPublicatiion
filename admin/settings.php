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
                <h4 class="page-title">Settings</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void();">Admin</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Change Password</li>
                </ol>
            </div>
        </div>
        <!-- End Breadcrumb-->

        <div class="row">
            <div class="col-lg-6">
                <div class="card bg-light">
                    <div class="card-body">
                        <div class="card-title">Change Password</div>
                        <hr>
                        <?php echo $user->get_alert(); ?>
                        <form method="POST" action="action/settings.action.php">
                            <div class="form-group">
                                <label for="current-password">Current Password</label>
                                <input type="password" class="form-control input-shadow bg-white"
                                    id="current-password" name="current_password"
                                    placeholder="Enter Current Password" required>
                            </div>

                            <div class="form-group">
                                <label for="new-password">New Password</label>
                                <input type="password" class="form-control input-shadow bg-white"
                                    id="new-password" name="new_password"
                                    placeholder="Enter New Password" required>
                            </div>

                            <div class="form-group">
                                <label for="confirm-password">Confirm New Password</label>
                                <input type="password" class="form-control input-shadow bg-white"
                                    id="confirm-password" name="confirm_password"
                                    placeholder="Confirm New Password" required>
                            </div>

                            <input type="hidden" name="changePassword" value="1">

                            <div class="form-group">
                                <button type="submit" class="btn btn-dark shadow-dark px-5">
                                    <i class="zmdi zmdi-lock"></i> Change Password
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
