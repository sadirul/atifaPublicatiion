<?php
require_once '../class/class.user.php';
$user = new User();

if($user->isLogedin()) {
	$user->redirect('index.php');
	exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from codervent.com/rukada/color-admin/authentication-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 09 Nov 2019 15:12:17 GMT -->

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<title>Login</title>
	<!--favicon-->
	<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
	<!-- Bootstrap core CSS-->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
	<!-- animate CSS-->
	<link href="assets/css/animate.css" rel="stylesheet" type="text/css" />
	<!-- Icons CSS-->
	<link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
	<!-- Custom Style-->
	<link href="assets/css/app-style.css" rel="stylesheet" />

</head>

<body class="bg-dark">
	<!-- Start wrapper-->
	<div id="wrapper">
		<div class="card card-authentication1 mx-auto my-5">
			<div class="card-body">
				<div class="card-content p-2">
					<div class="text-center">
						<img src="assets/images/logo-icon.png" alt="logo icon">
					</div>
					<div class="card-title text-uppercase text-center py-3">Sign In</div>
					<?php echo $user->get_alert(); ?>
					<form action="action/login.action.php" method="POST">
						<div class="form-group">
							<label for="exampleInputUsername" class="">Username</label>
							<div class="position-relative has-icon-right">
								<input type="text" id="exampleInputUsername" name="username" class="form-control input-shadow" placeholder="Enter Username">
								<div class="form-control-position">
									<i class="icon-user"></i>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword" class="">Password</label>
							<div class="position-relative has-icon-right">
								<input type="password" name="password" id="exampleInputPassword" class="form-control input-shadow" placeholder="Enter Password">
								<div class="form-control-position">
									<i class="icon-lock"></i>
								</div>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-6">
								<div class="icheck-material-primary">
									<input type="checkbox" id="user-checkbox" checked="" />
									<label for="user-checkbox">Remember me</label>
								</div>
							</div>
						</div>
						<button type="submit" class="btn btn-primary shadow-primary btn-block waves-effect waves-light">Sign In</button>
					</form>
				</div>
			</div>

		</div>

		<!--Start Back To Top Button-->
		<a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
		<!--End Back To Top Button-->
	</div><!--wrapper-->

	<!-- Bootstrap core JavaScript-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>

</body>

<!-- Mirrored from codervent.com/rukada/color-admin/authentication-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 09 Nov 2019 15:12:17 GMT -->

</html>