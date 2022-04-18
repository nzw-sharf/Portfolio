<?php
session_start();
include("../includes/database.php");
include("../functions/functions.php");

if (!$_SESSION["adminPanel_email"]) {
	header("location: ../index.php?error=Please-Provide-Your-Login-Details-Thanks.");
} else {

	$user_a = @$_SESSION["adminPanel_email"];

	$get_user_a = "select * from admin where admin_email = '$user_a'";
	$run_user_a = mysqli_query($con, $get_user_a);
	$row_a = mysqli_fetch_array($run_user_a);

	$adm_id_a = $row_a["admin_id"];

	if (isset($_GET["edit_serv"])) {

		$grab_id = $_GET["edit_serv"];

		$get_value = "select * from services where service_id = '$grab_id'";
		$run_value = mysqli_query($con, $get_value);
		$row_val = mysqli_fetch_array($run_value);

		$serv_id = $row_val["service_id"];
		$fch_servIcon = $row_val["service_icon"];
		$fch_servName = $row_val["service_name"];
		$fch_servDesc = $row_val["service_description"];
	}

?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<title>Updating <?php echo $fch_servName; ?> | <?php echo $comp_title; ?></title>

		<?php include("includes/head.php"); ?>

		<!-- include summernote -->
		<?php include("includes/summernote.php"); ?>
		<!-- //include summernote -->

	</head>

	<body>
		<div id="app">
			<div id="sidebar" class='active'>
				<div class="sidebar-wrapper active">
					<?php include("includes/side-bar.php"); ?>
				</div>
			</div>

			<div id="main">
				<?php include("includes/nav-section.php"); ?>

				<div class="main-content container-fluid">
					<div class="page-title">
						<div class="row">
							<div class="col-12 col-md-6 order-md-1 order-last">
								<h3>Updating <?php echo $fch_servName; ?></h3>
								<?php include("includes/page-subtitle.php"); ?>
							</div>
							<div class="col-12 col-md-6 order-md-2 order-first">
								<nav aria-label="breadcrumb" class='breadcrumb-header'>
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="./">Dashboard</a></li>
										<li class="breadcrumb-item active" aria-current="page">Updating Service</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>

					<section id="multiple-column-form">
						<div class="row match-height">
							<div class="col-12">
								<div class="card">
									<div class="card-content">
										<div class="card-body">

											<form action="" class="form" method="POST">
												<div class="row">

													<!-- Line -->
                                                    <div class="col-md-12 col-12">
                                                        <div class="form-group">
                                                            <label for="basicInput">SERVICE ICON</label>
                                                            <input type="text" value="<?php echo $fch_servIcon; ?>" class="form-control form-control-lg" name="serv_icon" placeholder="Service Fontawesome Icon *" required />
                                                        </div>
                                                    </div>
                                                    <!-- Line -->
                                                    <!-- Line -->
                                                    <div class="col-md-12 col-12">
                                                        <div class="form-group">
                                                            <label for="basicInput">SERVICE NAME</label>
                                                            <input type="text" value="<?php echo $fch_servName; ?>" class="form-control form-control-lg" name="serv_name" placeholder="Service Name *" required />
                                                        </div>
                                                    </div>
                                                    <!-- Line -->
                                                    <!-- Line -->
                                                    <div class="col-md-12 col-12">
                                                        <div class="form-group">
                                                            <label for="basicInput">SERVICE DESCRIPTION</label>
                                                            <textarea class="form-control form-control-lg" name="serv_desc" placeholder="Service Description *" required><?php echo $fch_servDesc; ?></textarea>
                                                        </div>
                                                    </div>
                                                    <!-- Line -->

													<br>
													<div class="col-12 d-flex justify-content-end">
														<button type="submit" class="btn btn-lg btn-primary mr-1 mb-1" name="update_service">Update Service</button>
													</div>
												</div>
											</form>
											<?php

											include("../includes/database.php");

											if (isset($_POST["update_service"])) {

                                                $serv_icon = mysqli_real_escape_string($con, $_POST["serv_icon"]);
                                                $serv_name = mysqli_real_escape_string($con, $_POST["serv_name"]);
                                                $serv_desc = mysqli_real_escape_string($con, $_POST["serv_desc"]);

												$_updatQuery = "update services set admin_id = '$adm_id_a', service_icon = '$serv_icon', service_name = '$serv_name', service_description = '$serv_desc', upload_date = NOW() where service_id = '$grab_id'";
												$run_updatQuery = mysqli_query($con, $_updatQuery);

												if ($run_updatQuery) {
													echo "<script>window.open('services.php?msg=Service Has Been Updated Successfully!','_self')</script>";
												} else {
													echo "<script>window.open('services.php?msg=There has been a problem, Please try again Later!','_self')</script>";
												}
											}

											?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>

				</div>


				<?php include("includes/footer.php"); ?>
	</body>

	</html>
<?php } ?>