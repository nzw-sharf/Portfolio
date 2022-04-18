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

if(isset($_GET["client_idef"])){
	
	$get_id = $_GET["client_idef"];
	$run_val = mysqli_query($con, "select * from clients where client_id = '$get_id'");
	$row_val = mysqli_fetch_array($run_val);
	
	$_compName = $row_val["client_name"];
	$_compLogo = $row_val["client_image"];
	$_UplDate = $row_val["upload_date"];
	
}else{
	header("location: ./");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Updating <?php echo $_compName; ?> - <?php echo $fullTitle; ?></title>
<?php include("includes/head.php"); ?>

<script>
  function numbersOnly(input){
	  var regex = /[^0-9.]/g;
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
						<h3>Updating <?php echo $_compName; ?></h3>
						<?php
							@$_msvVal = $_GET["msg"];
							if(isset($_GET["msg"])){
								echo "<p style='color:red;'>$_msvVal</p>";
							}else{
								include("includes/page-subtitle.php");
							}
						?>
					</div>
					<div class="col-12 col-md-6 order-md-2 order-first">
						<nav aria-label="breadcrumb" class='breadcrumb-header'>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="./">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Updating <?php echo $_compName; ?></li>
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
									<form action="" class="form" method="POST" enctype="multipart/form-data">
										<div class="row">
											
											<!-- Line -->
											<div class="col-md-12 col-12">
												<div class="form-group">
													<label for="basicInput">CLIENT NAME</label>
													<input type="text" class="form-control form-control-lg" name="client_name"  value="<?php echo $_compName; ?>" placeholder="Client Name *" required />
												</div>
											</div>
											<!-- Line -->
											
											<!-- Line -->
											<div class="col-md-12 col-12">
												<div class="form-group">
													<label for="basicInput">CLIENT IMAGE</label>
													<div class="form-file">
														<input type="file" name="imgFile" class="form-file-input" id="file" />
														<label class="form-file-label" for="customFile">
															<span class="form-file-text">Max. file size - 100kb | Dimension {200x150}</span>
															<span class="form-file-button">Browse</span>
														</label>
													</div>
												</div>
											</div>
											<!-- Line -->
											
											<hr />
											<div class="col-12 d-flex justify-content-end">
												<button type="submit" class="btn btn-lg btn-primary mr-1 mb-1" name="update_client">Update Client</button>
											</div>
										</div>
									</form>
									<?php

										include("../includes/database.php");

										if(isset($_POST["update_client"])){
											
											$client_name = mysqli_real_escape_string($con, $_POST["client_name"]);
											
											$client_imgFile = $_FILES["imgFile"]["name"];
											
											$file_ext = pathinfo($client_imgFile, PATHINFO_EXTENSION);
											$Nu_imgFile_name = time().".".$file_ext;
											
											$client_imgFile_tmp = $_FILES["imgFile"]["tmp_name"];
											
											if($client_imgFile == ""){
												$client_imgFile = $_compLogo;
												
												$update_query = "update clients set admin_id = '$adm_id_a', client_name = '$client_name',  client_image = '$client_imgFile', upload_date = '$_UplDate' where client_id = '$get_id'";
											
												$run_query	= mysqli_query($con, $update_query);
											
												if($run_query){
													echo "<script>window.open('clients.php?msg=Client Details has been Updated Successfully!','_self')</script>";
												}else{
													echo "<script>window.open('clients.php?msg=There Was A Problem, Please Try Again!','_self')</script>";
												}
											}else{
												move_uploaded_file($client_imgFile_tmp, "../images/clients/$Nu_imgFile_name");
							
												$update_query = "update clients set admin_id = '$adm_id_a', client_name = '$client_name', client_image = '$Nu_imgFile_name', upload_date = '$_UplDate' where client_id = '$get_id'";
											
												$run_query	= mysqli_query($con, $update_query);
											
												if($run_query){
													echo "<script>window.open('clients.php?msg=Client Details has been Updated Successfully!','_self')</script>";
												}else{
													echo "<script>window.open('clients.php?msg=There Was A Problem, Please Try Again!','_self')</script>";
												}
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

<script>
	$(document).ready(function(){
		
		//Image Size & Extension Verification
		$("input[type='file']").change(function(e){
			var fileSize = e.target.files[0].size;
			var fileName = $("#file").val();
			var fileExtension = fileName.split(".");
			fileExtension = fileExtension[fileExtension.length-1].toLowerCase();
			var arrayExtensions = ["jpg" , "jpeg", "png", "bmp", "gif"];
			
			if (arrayExtensions.lastIndexOf(fileExtension) == -1) {
				swal({
				  title: "Please Select Another File, Thanks!",
				  text: "Thanks for Using Shoot At Sight!",
				  icon: "warning",
				  button: "Click to Continue!",
				});
				$("#file").val("");
			}else if(fileSize > 100000){
				swal({
				  title: "Please Reduce Your Image Size, Thanks!",
				  text: "Thanks for Using Shoot At Sight!",
				  icon: "warning",
				  button: "Click to Continue!",
				});
				$("#file").val("");
			}else{
				//$("#imgName").text( $("#file").val() );
			}
			
		});//Image Size Verification
		
		//Image Dimension Verification
		var _URL = window.URL || window.webkitURL;
		$("#file").change(function(){
			var file = $(this)[0].files[0];
			img = new Image();
			var imgwidth = 0;
			var imgheight = 0;
			var allowedWidth = 200;
			var allowedHeight = 150;

			img.src = _URL.createObjectURL(file);
			img.onload = function(){
				imgwidth = this.width;
				imgheight = this.height;
				
				if(imgwidth == allowedWidth && imgheight == allowedHeight){
					//$("#imgName").text( $("#file").val() );
				}else{
					$("#file").val("");
					swal({
					  title: "Please Follow The Recommended Dimensions, Thanks!",
					  text: "Thanks for Using Shoot At Sight!",
					  icon: "warning",
					  button: "Click to Continue!",
					});
				}
			};

		});//Image Dimension Verification
		
	});
</script>

<?php include("includes/footer.php"); ?>
</body>
</html>
<?php } ?>