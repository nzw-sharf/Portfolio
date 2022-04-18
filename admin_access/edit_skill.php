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

	if (isset($_GET["edit_skill"])) {

		$grab_id = $_GET["edit_skill"];

		$get_value = "select * from skills where skill_id = '$grab_id'";
		$run_value = mysqli_query($con, $get_value);
		$row_val = mysqli_fetch_array($run_value);

		$skl_id = $row_val["skill_id"];
		$fch_sklName = $row_val["skill_name"];
		$fch_sklPer = $row_val["skill_percentage"];
	}

?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<title>Updating <?php echo $fch_sklName; ?> | <?php echo $comp_title; ?></title>

		<?php include("includes/head.php"); ?>

		<!-- include summernote -->
		<?php include("includes/summernote.php"); ?>
		<!-- //include summernote -->
        <script>
            function numbersOnly(input) {
                var regex = /[^0-9a-z-]/g;
                input.value = input.value.replace(regex, "");
            }
        </script>

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
								<h3>Updating <?php echo $fch_sklName; ?></h3>
								<?php include("includes/page-subtitle.php"); ?>
							</div>
							<div class="col-12 col-md-6 order-md-2 order-first">
								<nav aria-label="breadcrumb" class='breadcrumb-header'>
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="./">Dashboard</a></li>
										<li class="breadcrumb-item active" aria-current="page">Updating Skill</li>
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
                                                            <label for="basicInput">SKILL TITLE</label>
                                                            <input type="text" class="form-control form-control-lg" name="skill_title" placeholder="Skill Title *" value="<?php echo $fch_sklName; ?>" required />
                                                        </div>
                                                    </div>
                                                    <!-- Line -->
                                                    <!-- Line -->
                                                    <div class="col-md-12 col-12">
                                                        <div class="form-group">
                                                            <label for="basicInput">SKILL PERCENTAGE</label>
                                                            <input type="number" class="form-control form-control-lg" onkeyup="numbersOnly(this)" name="skill_percent" value="<?php echo $fch_sklPer; ?>" placeholder="Skill Percentage *" required />
                                                        </div>
                                                    </div>
                                                    <!-- Line -->

													<br>
													<div class="col-12 d-flex justify-content-end">
														<button type="submit" class="btn btn-lg btn-primary mr-1 mb-1" name="update_skill">Update Skill</button>
													</div>
												</div>
											</form>
											<?php

											include("../includes/database.php");

											if (isset($_POST["update_skill"])) {

                                                $skill_title = mysqli_real_escape_string($con, $_POST["skill_title"]);
                                                $skill_percent = mysqli_real_escape_string($con, $_POST["skill_percent"]);

												$_updatQuery = "update skills set admin_id = '$adm_id_a', skill_name = '$skill_title', skill_percentage = '$skill_percent', upload_date = NOW() where skill_id = '$grab_id'";
												$run_updatQuery = mysqli_query($con, $_updatQuery);

												if ($run_updatQuery) {
													echo "<script>window.open('skills.php?msg=Skill Has Been Updated Successfully!','_self')</script>";
												} else {
													echo "<script>window.open('skills.php?msg=There has been a problem, Please try again Later!','_self')</script>";
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