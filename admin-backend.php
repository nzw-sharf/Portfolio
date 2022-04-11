<?php
session_start();
include("includes/database.php");
include("functions/functions.php");

$getIDf = mysqli_real_escape_string($con, $_GET["refID"]);
$get_id = preg_replace("/[^a-z0-9]/", "", $getIDf);

if ($get_id == "3hr33d1g1t") {
} else {
	header("Location: ./");
}
?>
<!doctype html>
<html lang="en">

<head>
	<?php include("includes/head.php"); ?>
</head>

<body>
	<section id="home">
		<div class="hero-wrap">
			<div class="hero-mask opacity-7 bg-dark"></div>
			<div class="hero-bg parallax" style="background-image:url('images/intro-bg-3.jpg');"></div>
			<div class="hero-content section d-flex fullscreen" style="min-height:300px !important;">
				<div class="container my-auto">
					<div class="row">
						<div class="col-12 text-center">
							<h5 class="text-5 text-uppercase text-primary ls-4 mb-2 mb-md-3">Administrator Access</h5>

							<p class="text-5 text-light">Restricted Area.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<section class="pt-5 pb-5 bg-dark-1">
		<div class="container">
			<div class="row justify-content-md-center">

				<div class="col-md-6  bg-dark shadow py-3">

					<form action="" method="POST">
						<div class="forms-29-form">
							<div class="mb-3">
								<label class="input__label mb-3 text-white">Admin Email</label>
								<div class="input-icon position-relative">
									<input type="email" name="admin_email" class="form-control form-control-lg" placeholder="Your Login Email Here" required />
								</div>
							</div>
							<div class="mb-3">
								<label class="input__label mb-3 text-white">Admin Password</label>
								<div class="input-group mb-3">
									<input type="password" name="admin_password" class="form-control form-control-lg" id="login_password" placeholder="Your Login Password Here" required />
									<span class="input-group-text passOpen" id="basic-addon2"><i class="fa fa-eye"></i></span>
								</div>
							</div>
						</div>
						<div class="justify-content-center">
							<button type="submit" name="admin_login" class="btn btn-primary rounded-pill mt-2 mb-3">Access Control Panel</button><br>
						</div>
						<?php
						$urlMsg = @$_GET["msg"];
						if (isset($_GET["msg"])) {
							echo "<span style='color:red; font-weight:bold;'>" . $urlMsg . "</span><hr />";
						} else {
						}

						if (isset($_GET["error"])) {
							echo "<span style='color:red; font-weight:bold;'>Provide Your Login Details.</span><hr />";
						} else {
						}
						?>
					</form>

					<?php

					include("includes/database.php");

					if (isset($_POST["admin_login"])) {

						$admin_email = $_POST["admin_email"];
						$admin_password = $_POST["admin_password"];

						$admin_email = stripslashes($admin_email);
						$admin_password = stripslashes($admin_password);

						$admin_email = mysqli_real_escape_string($con, $admin_email);
						$admin_password = mysqli_real_escape_string($con, $admin_password);

						$get_user = "select * from admin where admin_email = '$admin_email' AND BINARY admin_password = '$admin_password'";
						$run_user = mysqli_query($con, $get_user);
						$check = mysqli_num_rows($run_user);

						if ($check == 1) {
							$upd_query = "update admin set last_login = NOW() where admin_email = '$admin_email'";
							$run_upd = mysqli_query($con, $upd_query);

							if ($run_upd) {
								$_SESSION["adminPanel_email"] = $admin_email;
								echo "<script>window.open('admin_access/','_self')</script>";
							}
						} else {
							echo "<script>window.open('backend?refID=3r33d1g1t&msg=Incorrect Administrator Login Details Provided. Please Try Again.','_self')</script>";
							exit();
						}
					}
					?>

				</div>

			</div>
		</div>
	</section>

	<script>
		$(document).ready(function() {
			$(".passOpen").click(function() {
				var inputType = $('#login_password').attr('type');
				if (inputType == "password") {
					$("#login_password").attr('type', 'text');
				} else {
					$("#login_password").attr('type', 'password');
				}
			});
		});
	</script>

	<?php include("includes/footer.php"); ?>
</body>

</html>