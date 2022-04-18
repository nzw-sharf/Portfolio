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
<title>My Account Information | <?php echo $fullTitle; ?></title>
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
				<div class="row">
					<div class="col-12 col-md-6">
						<h3>My Account Information</h3>
						<p class="text-subtitle text-muted">
						<?php
							include("includes/page-subtitle.php");
							@$msgVal = $_GET["msg"];
							if(isset($_GET["msg"])){
								echo "<span style='color:red;'>$msgVal</span>";
							}else{}
						?>
						</p>
					</div>
					<div class="col-12 col-md-6">
						<nav aria-label="breadcrumb" class='breadcrumb-header text-right'>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="./">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page"><?php echo $user_a; ?></li>
							</ol>
						</nav>
					</div>
				</div>
			</div><hr />
			
			<section id="content-types">
				<div class="row">
					<?php
					
						include("../includes/database.php");
						
						$query = "select * from admin where admin_id = '$adm_id_a'";
						$run_qu = mysqli_query($con, $query);
						$row_q = mysqli_fetch_array($run_qu);
							
						$admin_id = $row_q["admin_id"];
						$admin_email = $row_q["admin_email"];
						$admin_password = $row_q["admin_password"];
						
						$ad_coy_fname = $row_q["admin_fullname"];
						$ad_coy_url = $row_q["website_url"];
						$ad_coy_title = $row_q["admin_title"];
						$ad_coy_tagline = $row_q["admin_tagline"];
						$ad_coy_addr = $row_q["company_address"];
						$ad_coy_email = $row_q["email_address"];
						$ad_coy_phone = $row_q["phone_number"];
						
						$last_login = $row_q['last_login'];
					
					?>
					<div class="col-xl-12 col-md-12 col-sm-12 divBox">
						<div class="card">
							<div class="card-content">
								<div class="card-body">
									
									<div class="form-group">
										<div class="row">
											<div class="col-md-12">
												Full Name: <input type="text" class="form-control form-control-lg" autocomplete="off" value="<?php echo $ad_coy_fname; ?>" placeholder="This Goes To The Homepage" disabled />
											</div>
											<div class="clearfix"> </div>
										</div>
									</div>
									
									<div class="form-group">
										<div class="row">
											<div class="col-md-6">
												Account Password: <input type="password" class="form-control form-control-lg" placeholder="Account Password Goes Here" value="<?php echo $admin_password; ?>" disabled />
											</div>
											<div class="col-md-6">
												Website URL: <input type="url" class="form-control form-control-lg" autocomplete="off" value="<?php echo $ad_coy_url; ?>" placeholder="Please Use This Format https://www.nazwa.com/" disabled />
											</div>
											<div class="clearfix"> </div>
										</div>
									</div>
									
									<div class="form-group">
										<div class="row">
											<div class="col-md-12">
												Title: <input type="text" class="form-control form-control-lg" autocomplete="off" value="<?php echo $ad_coy_title; ?>" placeholder="This Goes To Other Pages" disabled />
											</div>
											<div class="clearfix"> </div>
										</div>
									</div>
									
									<div class="form-group">
										<div class="row">
											<div class="col-md-12">
												Tagline: <input type="text" class="form-control form-control-lg" autocomplete="off" value="<?php echo $ad_coy_tagline; ?>" placeholder="Company Tagline Goes Here" disabled />
											</div>
											<div class="clearfix"> </div>
										</div>
									</div>
									
									<div class="form-group">
										<div class="row">
											<div class="col-md-12">
												Address : <input type="text" class="form-control form-control-lg" autocomplete="off" value="<?php echo $ad_coy_addr; ?>" placeholder="Company's Address Goes Here" disabled />
											</div>
											<div class="clearfix"> </div>
										</div>
									</div>
									
									<div class="form-group">
										<div class="row">
											<div class="col-md-6">
												Phone : <input type="text" class="form-control form-control-lg" value="<?php echo $ad_coy_phone; ?>" placeholder="Company Phone Goes Here" disabled />
											</div>
											<div class="col-md-6">
												Email : <input type="text" class="form-control form-control-lg" value="<?php echo $ad_coy_email; ?>" placeholder="Company Email Goes Here" disabled />
											</div>
											<div class="clearfix"> </div>
										</div>
									</div>
									
									<br><p>Last Login: <time class="timeago" datetime="<?php echo $last_login; ?>"></time></p>
									
								</div>
							</div>
							<div class="card-footer d-flex justify-content-between">
								<a href="edit_profile.php?edit_profile=<?php echo $admin_id; ?>" class="btn btn-lg btn-outline-primary">Edit Account Information</a>
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