<?php
session_start();
include("includes/database.php");
include("functions/functions.php");

$getIDf = mysqli_real_escape_string($con, $_GET["refID"]);
$get_id = preg_replace("/[^a-z0-9]/", "", $getIDf);

if($get_id == "3hr33d1g1t"){}else{ header("Location: ./"); }
?>
<!doctype html>
<html lang="en">
<head>
<?php include("includes/head.php"); ?>
</head>
<body>
<section class="mb-0 pb-0 purpleBG">
	<div class="nu_relCont">
		<img src="assets/images/banner-8.jpg" alt="shoot at sight" class="img-fluid forPC" title="film production company dubai" />
		<img src="assets/images/banner-9.jpg" alt="shoot at sight" class="img-fluid forMobile" title="film production company dubai" />
		<div class="centered-left forPC" style="top:60%;left:28%;max-width:50%;">
			<h3>Administrator's Login</h3>
			<p style="font-size:14px;">Restricted Area</p>
		</div>
		<div class="nu_absCont nav-top" style="top:0%;left:0%;width:100%;">
			<?php include("includes/header.php"); ?>
		</div>
	</div>
</section>


<section class="pt-5 pb-5">
	<div class="container">
		<div class="row justify-content-md-center">
			
			<div class="col-md-6 shadow py-3">
				
				<form action="" method="POST">
					<div class="forms-29-form">
						<div class="mb-3">
							<label class="input__label mb-3 text-white">Admin Email</label>
							<div class="input-icon position-relative">
								<input type="email" name="admin_email" class="form-control form-control-lg" placeholder="Your Login Email Here" required />
							</div>
						</div>
						
						<label class="input__label mb-3 text-white">Admin Password</label>
						<div class="input-group mb-3">
							<input type="password" name="admin_password" class="form-control form-control-lg" id="login_password" placeholder="Your Login Password Here" required />
							<span class="input-group-text passOpen" id="basic-addon2"><i class="fa fa-eye"></i></span>
						</div>
						
					</div>
					<button type="submit" name="admin_login" class="btn btn-lg btn-danger btn-style mt-2 mb-3">Access Control Panel</button><br>
					
					<?php
						$urlMsg = @$_GET["msg"];
						if(isset($_GET["msg"])){echo "<span style='color:red; font-weight:bold;'>".$urlMsg."</span><hr />";}else{}
						
						if(isset($_GET["error"])){echo "<span style='color:red; font-weight:bold;'>Provide Your Login Details.</span><hr />";}else{}
					?>
				</form>
				
				<?php

					include("includes/database.php");

					if(isset($_POST["admin_login"])){

						$admin_email = $_POST["admin_email"];
						$admin_password = $_POST["admin_password"];
						
						$admin_email = stripslashes($admin_email);
						$admin_password = stripslashes($admin_password);
						
						$admin_email = mysqli_real_escape_string($con, $admin_email);
						$admin_password = mysqli_real_escape_string($con, $admin_password);

						$get_user = "select * from admin where admin_email = '$admin_email' AND BINARY admin_password = '$admin_password'";
						$run_user = mysqli_query($con, $get_user);
						$check = mysqli_num_rows($run_user);

						if($check == 1){
							$upd_query = "update admin set last_login = NOW() where admin_email = '$admin_email'";
							$run_upd = mysqli_query($con, $upd_query);
								
							if($run_upd){
								$_SESSION["adminPanel_email"] = $admin_email;
								echo "<script>window.open('admin_access/','_self')</script>";
							}
						}else{
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
	$(".passOpen").click(function(){
		var inputType = $('#login_password').attr('type');
		if(inputType == "password"){
			$("#login_password").attr('type', 'text');
		}else{
			$("#login_password").attr('type', 'password');
		}
	});
});
</script>

<?php include("includes/footer.php"); ?>
</body>
</html>