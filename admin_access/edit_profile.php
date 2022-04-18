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

if(isset($_GET["edit_profile"])){

	$grab_id = $_GET["edit_profile"];

	$get_value = "select * from admin where admin_id = '$grab_id'";
	$run_value = mysqli_query($con, $get_value);
	$row_val = mysqli_fetch_array($run_value);

	$ad_id = $row_val["admin_id"];
	$ad_email = $row_val["admin_email"];
	$ad_pass = $row_val["admin_password"];
	
	$ad_coy_fname = $row_val["admin_fullname"];
	$ad_coy_url = $row_val["website_url"];
	$ad_coy_title = $row_val["admin_title"];
	$ad_coy_tagline = $row_val["admin_tagline"];
	$ad_coy_addr = $row_val["company_address"];
	$ad_coy_email = $row_val["email_address"];
	$ad_coy_phone = $row_val["phone_number"];
	
	$last_log = $row_val["last_login"];
	
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Update My Account Information | <?php echo $fullTitle; ?></title>
<?php include("includes/head.php"); ?>

<script>
  function numbersOnly(input){
	  var regex = /[^0-9+]/g;
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
					
					<div class="col-xl-12 col-md-12 col-sm-12 divBox">
						<div class="card">
							<div class="card-content">
								<div class="card-body">
									
									<form class="com-mail" action="edit_profile.php?edit_profile=<?php echo $grab_id; ?>" method="POST">
								
										<div class="form-group">
											<div class="row">
												<div class="col-md-12">
													Full Name: <input type="text" class="form-control form-control-lg" value="<?php echo $ad_coy_fname; ?>" name="ad_coy_fname" required />
												</div>
												<div class="clearfix"> </div>
											</div>
										</div>
										
										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													cPanel Password: <input type="password" class="form-control form-control-lg" value="<?php echo $ad_pass; ?>" name="ad_pass" required />
												</div>
												<div class="col-md-6">
													Website URL: <input type="url" class="form-control form-control-lg" value="<?php echo $ad_coy_url; ?>" name="ad_coy_url" required />
												</div>
												<div class="clearfix"> </div>
											</div>
										</div>
										
										<div class="form-group">
											<div class="row">
												<div class="col-md-12">
													Admin Title: <input type="text" class="form-control form-control-lg" value="<?php echo $ad_coy_title; ?>" name="ad_coy_title" required />
												</div>
												<div class="clearfix"> </div>
											</div>
										</div>
										
										<div class="form-group">
											<div class="row">
												<div class="col-md-12">
													Admin Tagline: <input type="text" class="form-control form-control-lg" value="<?php echo $ad_coy_tagline; ?>" name="ad_coy_tagline" required />
												</div>
												<div class="clearfix"> </div>
											</div>
										</div>
										
										<div class="form-group">
											<div class="row">
												<div class="col-md-12">
												Admin Address : <input type="text" class="form-control form-control-lg" value="<?php echo $ad_coy_addr; ?>" name="ad_coy_addr" required />
												</div>
												<div class="clearfix"> </div>
											</div>
										</div>
										
										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
												Admin Phone: <input type="text" class="form-control form-control-lg" onkeyup="numbersOnly(this)" value="<?php echo $ad_coy_phone; ?>" name="ad_coy_phone1" required />
												</div>
												<div class="col-md-6">
												Admin Email : <input type="email" class="form-control form-control-lg" value="<?php echo $ad_coy_email; ?>" name="ad_coy_email1" required />
												</div>
												<div class="clearfix"> </div>
											</div>
										</div>
										
										
										<div class="form-group">
											<div class="row">
												<div class="col-md-12">
													<input type="submit" class="btn btn-lg btn-outline-primary" value="Update Account Information" name="update_profile" />
												</div>
												<div class="clearfix"> </div>
											</div>
										</div>
									</form>
									<?php
										
										if(isset($_POST['update_profile'])){
											
											$ad_pass1 = mysqli_real_escape_string($con, $_POST['ad_pass']);
											$ad_coy_fname1 = mysqli_real_escape_string($con, $_POST['ad_coy_fname']);
											$ad_coy_url1 = mysqli_real_escape_string($con, $_POST['ad_coy_url']);
											$ad_coy_title1 = mysqli_real_escape_string($con, $_POST['ad_coy_title']);
											$ad_coy_tagline1 = mysqli_real_escape_string($con, $_POST['ad_coy_tagline']);
											$ad_coy_addr1 = mysqli_real_escape_string($con, $_POST['ad_coy_addr']);
											$ad_coy_phone11 = mysqli_real_escape_string($con, $_POST['ad_coy_phone1']);
											$ad_coy_email11 = mysqli_real_escape_string($con, $_POST['ad_coy_email1']);
											
											$db_update_query = "UPDATE admin set admin_password = '$ad_pass1', admin_fullname = '$ad_coy_fname1', website_url = '$ad_coy_url1', admin_title = '$ad_coy_title1', admin_tagline = '$ad_coy_tagline1', company_address = '$ad_coy_addr1', email_address = '$ad_coy_email11',  phone_number = '$ad_coy_phone11', last_login = '$last_log' where admin_id = '$grab_id'";
											
											$run_db_update = mysqli_query($con, $db_update_query);
											
											if($run_db_update){
												echo "<script>window.open('my_profile.php?msg=Your Account Information Has Been Updated Successfully!','_self')</script>";
											}
											
										}
										
									?>
									
								</div>
							</div>
							<div class="card-footer d-flex justify-content-between">
								<p>Last Login: <time class='timeago' datetime='<?php echo $last_log; ?>'></time></p>
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