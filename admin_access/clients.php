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
<title>My Clients - <?php echo $fullTitle; ?></title>
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
						<h3>My Clients</h3>
						<p class="text-subtitle text-muted">
						<?php
							
							@$msgVal = $_GET["msg"];
							if(isset($_GET["msg"])){
								echo "<span style='color:red;'>$msgVal</span>";
							}else{
							    include("includes/page-subtitle.php");
							}
						?>
						</p>
					</div>
					<div class="col-12 col-md-6">
						<nav aria-label="breadcrumb" class='breadcrumb-header text-right'>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="./">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">My Clients</li>
							</ol>
						</nav>
					</div>
				</div>
			</div><hr />
			
			<section id="content-types">
				<div class="row">
					<?php
						include("../includes/database.php");
						
						$per_page = 24;
						if(isset($_GET['page'])){
							$page = preg_replace('#[^0-9]#', '', $_GET['page']);
						}else{
							$page = 1;
						}

						$start_from = ($page - 1) * $per_page;
						$proDBQue = "select * from clients ORDER BY 1 DESC LIMIT $start_from, $per_page";
						$run_proDBQue = mysqli_query($con, $proDBQue);
						$cnt_proDBQue = mysqli_num_rows($run_proDBQue);
						if($cnt_proDBQue == 0){
							
						}else{
							while($row_ValQuer = mysqli_fetch_array($run_proDBQue)){
								
								$fch_cliID = $row_ValQuer["client_id"];
								$fch_compName = $row_ValQuer["client_name"];
								$fch_compLogo = $row_ValQuer["client_image"];
					
					?>
					<div class="col-xl-4 col-md-6 col-sm-12 divBox">
						<div class="card">
							<div class="card-content">
								<div class="card-body">
									<h4 class="card-title"><?php echo $fch_compName; ?></h4>
								</div>
								<img class="img-fluid" src="../images/clients/<?php echo $fch_compLogo; ?>" alt="SAS <?php echo $fch_compName; ?>">
							</div>
							<div class="card-footer d-flex justify-content-between">
								<a href="edit_client.php?client_idef=<?php echo $fch_cliID; ?>" class="btn btn-outline-primary">Edit</a>
								<button class="btn btn-outline-primary delBtn" delID="<?php echo $fch_cliID; ?>">Delete</button>
							</div>
						</div>
					</div>
					<?php }} ?>
					
					<hr />
					<div class="col-lg-12">
						<!-- pagination -->
						<center>
							<h3><?php include("client_pagination.php"); ?></h3>
						</center>
						<!-- //pagination -->
					</div>
				
				</div>
			</section>
		</div>

<!-- Javascript function for deleting data -->
<script>
$(document).ready(function(){
	
	//deleting contact messages
	$("body").delegate(".delBtn","click",function(){
		var delButtonID = $(this).attr("delID");
		var el = this;
		if(confirm("Confirm Delete!")){
			$.ajax({
				type:"POST",
				url:"delete_client.php",
				data: { send_idef_val: delButtonID },
				success:function(new_entry){
					$(el).closest(".divBox").css("background","skyblue");
					$(el).closest(".divBox").fadeOut(800,function(){
						$(el).remove();
						swal({
						  title: new_entry,
						  text: "Thanks for Using Shoot At Sight!",
						  icon: "success",
						  button: "Click to Continue!",
						});
						
					});
				}
			});
		}
	});
    
});
</script>
<!-- Javascript function for deleting data -->

<?php include("includes/footer.php"); ?>
</body>
</html>
<?php } ?>