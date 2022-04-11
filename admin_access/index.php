<?php
session_start();
include("../includes/database.php");

if(!$_SESSION["adminPanel_email"]){
	header("location: ../index.php?error=Please-Provide-Your-Login-Details-Thanks.");
}else{

$user_a = @$_SESSION["adminPanel_email"];

$get_user_a = "select * from admin where admin_email = '$user_a'";
$run_user_a = mysqli_query($con, $get_user_a);
$row_a = mysqli_fetch_array($run_user_a);

$adm_id_a = $row_a["admin_id"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Dashboard - <?php echo $fullTitle; ?></title>
<?php include("includes/head.php"); ?>
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
				<h3>Dashboard</h3>
				<?php include("includes/page-subtitle.php"); ?>
			</div>
			
			<section class="section">
				
				<div class="row mb-2">
					<!-- Line -->
					<div class="col-12 col-md-3">
						<div class="card card-statistic">
							<div class="card-body p-0">
								<div class="d-flex flex-column">
									<div class='px-3 py-3 d-flex justify-content-between'>
										<h3 class='card-title'>Cont. Form</h3>
										<div class="card-right d-flex align-items-center">
											<?php
												//include("../includes/database.php");
												$_fQu2 = mysqli_query($con, "select * from quick_enquiry where qe_status = 'unread'");
												$_cntfQu2 = mysqli_num_rows($_fQu2);
											?>
											<p><?php echo $_cntfQu2; ?></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div><!-- Line -->
					
					<!-- Line -->
					<div class="col-12 col-md-3">
						<div class="card card-statistic">
							<div class="card-body p-0">
								<div class="d-flex flex-column">
									<div class='px-3 py-3 d-flex justify-content-between'>
										<h3 class='card-title'>Categories</h3>
										<div class="card-right d-flex align-items-center">
											<?php
												//include("../includes/database.php");
												$_fQu3 = mysqli_query($con, "select * from portfolio_category");
												$_cntfQu3 = mysqli_num_rows($_fQu3);
											?>
											<p><?php echo $_cntfQu3; ?></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div><!-- Line -->
					
					<!-- Line -->
					<div class="col-12 col-md-3">
						<div class="card card-statistic">
							<div class="card-body p-0">
								<div class="d-flex flex-column">
									<div class='px-3 py-3 d-flex justify-content-between'>
										<h3 class='card-title'>Services</h3>
										<div class="card-right d-flex align-items-center">
											<?php
												//include("../includes/database.php");
												$_fQu5 = mysqli_query($con, "select * from services");
												$_cntfQu5 = mysqli_num_rows($_fQu5);
											?>
											<p><?php echo $_cntfQu5; ?></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div><!-- Line -->
					
					<!-- Line -->
					<div class="col-12 col-md-3">
						<div class="card card-statistic">
							<div class="card-body p-0">
								<div class="d-flex flex-column">
									<div class='px-3 py-3 d-flex justify-content-between'>
										<h3 class='card-title'>Projects</h3>
										<div class="card-right d-flex align-items-center">
											<?php
												//include("../includes/database.php");
												$_fQu6 = mysqli_query($con, "select * from project");
												$_cntfQu6 = mysqli_num_rows($_fQu6);
											?>
											<p><?php echo $_cntfQu6; ?></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div><!-- Line -->
					
					<!-- Line -->
					<div class="col-12 col-md-3">
						<div class="card card-statistic">
							<div class="card-body p-0">
								<div class="d-flex flex-column">
									<div class='px-3 py-3 d-flex justify-content-between'>
										<h3 class='card-title'>Skills</h3>
										<div class="card-right d-flex align-items-center">
											<?php
												//include("../includes/database.php");
												$_fQu1 = mysqli_query($con, "select * from skills");
												$_cntfQuq = mysqli_num_rows($_fQu1);
											?>
											<p><?php echo $_cntfQuq; ?></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div><!-- Line -->
					
					<!-- Line -->
					<div class="col-12 col-md-3">
						<div class="card card-statistic">
							<div class="card-body p-0">
								<div class="d-flex flex-column">
									<div class='px-3 py-3 d-flex justify-content-between'>
										<h3 class='card-title'><a href="uvts_breakdown.php" class="text-white">Clients</a></h3>
										<div class="card-right d-flex align-items-center">
											<?php
												//include("../includes/database.php");
												$_fQu4 = mysqli_query($con, "select * from clients");
												$_cntfQuq4 = mysqli_num_rows($_fQu4);
											?>
											<p><?php echo $_cntfQuq4; ?></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div><!-- Line -->
					
					
				</div>

			</section>
		</div>

<?php include("includes/footer.php"); ?>
</body>
</html>
<?php } ?>