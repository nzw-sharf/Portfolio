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
<title>Modify Website Content | <?php echo $fullTitle; ?></title>
<?php include("includes/head.php"); ?>
<script>
  function numbersOnly(input){
	  var regex = /[^0-9]/g;
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
						<h3>Modify Website Content</h3>
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
						$last_login = $row_q["last_login"];
						
						$get_mod_qu = "select * from modify_home_page where admin_id = '$adm_id_a'";
						$run_mod_qu = mysqli_query($con, $get_mod_qu);
						$row_mod_qu = mysqli_fetch_array($run_mod_qu);
						
						$home_pg_id = $row_mod_qu["home_page_id"];
						$home_pg_title = $row_mod_qu["home_page_title"];
						$pg_title = $row_mod_qu["page_title"];
						$hm_web_keyw = $row_mod_qu["website_keyword"];
						$hm_web_desc = $row_mod_qu["website_description"];
						$acct_whatsapp = $row_mod_qu["whatsapp"];
					
					?>
					<div class="col-xl-12 col-md-12 col-sm-12 divBox">
						<div class="card">
							<div class="card-content">
								<div class="card-body">
									
									<div class="form-group">
										<div class="row">
											<div class="col-md-12">
												Home Page Title: <input type="text" class="form-control form-control-lg" placeholder="The Website Home Page Title Goes Here" id="grb_hmpg_title" value="<?php echo $home_pg_title; ?>" />
											</div>
											
											<div class="clearfix"></div>
										</div>
									</div>
									
									<div class="form-group">
										<div class="row">
											<div class="col-md-12">
												Page Title: <input type="text" class="form-control form-control-lg" placeholder="The Other Page Title Goes Here" id="grb_pg_title" value="<?php echo $pg_title; ?>" />
											</div>
											<div class="clearfix"> </div>
										</div>
									</div>
									
									<div class="form-group">
										<div class="row">
											<div class="col-md-12">
												WhatsApp: <input type="text" onkeyup="numbersOnly(this)" class="form-control form-control-lg" placeholder="WhatsApp Number e.g. 971588586133" id="grb_pg_whatsapp" value="<?php echo $acct_whatsapp; ?>" />
											</div>
											<div class="clearfix"> </div>
										</div>
									</div>
									
									<div class="form-group">
										<div class="row">
											<div class="col-md-12">
												Website Keywords: 
												<textarea class="form-control form-control-lg" style="height: 150px;" placeholder="Please Seperate With Commas (,)" id="grb_web_keywrd"><?php echo $hm_web_keyw; ?></textarea>
											</div>
											<div class="clearfix"> </div>
										</div>
									</div>
									
									<div class="form-group">
										<div class="row">
											<div class="col-md-12">
												Website Description: 
												<textarea class="form-control form-control-lg" style="height: 150px;" placeholder="Website Description Goes Here" id="grb_web_desc"><?php echo $hm_web_desc; ?></textarea>
											</div>
											<div class="clearfix"> </div>
										</div>
									</div>
									
									
								</div>
							</div>
							<div class="card-footer d-flex justify-content-between">
								<button class="btn btn-lg btn-outline-primary" id="update_home_page">Click To Update Website Settings</button>
							</div>
						</div>
					</div>
					
				</div>
			</section>
		</div>

<script type="text/javascript">
$(document).ready(function(){
	$("body").delegate("#update_home_page","click",function(){
		var user_idef = <?php echo $admin_id; ?>;
		var hompg_idef = <?php echo $home_pg_id; ?>;
		
		var grb_hmpg_title = $("#grb_hmpg_title").val();
		var grb_web_keywrd = $("#grb_web_keywrd").val();
		var grb_pg_title = $("#grb_pg_title").val();
		var grb_web_desc = $("#grb_web_desc").val();
		var grb_pg_whatsapp = $("#grb_pg_whatsapp").val();
		
		$.ajax({
			url: "update_my_website_data.php",
			method: "POST",
			data: {admin_idef:user_idef, homepg_idef:hompg_idef, grb_hmpg_title1:grb_hmpg_title, grb_web_keywrd1:grb_web_keywrd, grb_pg_title1:grb_pg_title, grb_web_desc1:grb_web_desc, grb_pg_whatsapp1:grb_pg_whatsapp},
			success: function(response){
				swal({
				  title: response,
				  text: "Thanks for Using The Website!",
				  icon: "success",
				  button: "Click to Continue!",
				});
			}
		});
	});
});
</script>

<?php include("includes/footer.php"); ?>
</body>
</html>
<?php } ?>