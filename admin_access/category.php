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
<title>Categories - <?php echo $fullTitle; ?></title>
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
						<h3>Categories</h3>
						<p class="text-subtitle text-muted">
						<?php
							@$msgVal = $_GET["msg"];
							if(isset($_GET["msg"])){
								echo "<span style='color:red;'>$msgVal</span>";
							}else{include("includes/page-subtitle.php");}
						?>
						</p>
					</div>
					<div class="col-12 col-md-6">
						<nav aria-label="breadcrumb" class='breadcrumb-header text-right'>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="./">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Categories</li>
							</ol>
						</nav>
					</div>
				</div>
			</div><hr />
			
			<section id="basic-modals">
				<div class="row">
					<?php
						include("../includes/database.php");
						
						
						$proDBQue = "select * from portfolio_category ORDER BY 1 DESC";
						$run_proDBQue = mysqli_query($con, $proDBQue);
						$cnt_proDBQue = mysqli_num_rows($run_proDBQue);
						if($cnt_proDBQue == 0){}else{
							while($row_ValQuer = mysqli_fetch_array($run_proDBQue)){
								
								$fch_catID = $row_ValQuer["cat_id"];
								$fch_catName = $row_ValQuer["category_name"];
													
					?>
					<div class="col-md-4 col-12 divBox">
						<div class="card">
							<div class="card-content">
								<img src="../images/logo-light.png" class="card-img-top img-fluid" alt="<?php echo $fch_catName; ?>" title="<?php echo $fch_catName; ?>" />
								<div class="card-body">
									<p class="card-text"><b><?php echo $fch_catName; ?></b></p>
								</div>
							</div>
							<div class="card-footer d-flex justify-content-between">
								<a href="edit_category.php?edit_category=<?php echo $fch_catID; ?>" class="btn btn-outline-primary">Edit</a>
								<button class="btn btn-outline-primary delBtn" delID="<?php echo $fch_catID; ?>">Delete</button>
							</div>
						</div>
					</div>
					<?php }} ?>
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
				url:"delete_category.php",
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