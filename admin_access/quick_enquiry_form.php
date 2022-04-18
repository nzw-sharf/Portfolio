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
<title>Quick Enquiry Form Messages - <?php echo $fullTitle; ?></title>
<?php include("includes/head.php"); ?>

<!-- bootstrap toggle -->
<link href="assets/bootstrap-toggle.css" rel="stylesheet" type="text/css" />
<script src="assets/bootstrap-toggle.js"></script>
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
						<h3>Quick Enquiry Form Messages</h3>
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
								<li class="breadcrumb-item active" aria-current="page">Quick Enquiry Form Messages</li>
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
						$proDBQue = "select * from quick_enquiry ORDER BY 1 DESC LIMIT $start_from, $per_page";
						$run_proDBQue = mysqli_query($con, $proDBQue);
						$cnt_proDBQue = mysqli_num_rows($run_proDBQue);
						if($cnt_proDBQue == 0){
							
						}else{
							while($row_cnt_msg_qu = mysqli_fetch_array($run_proDBQue)){
								
							$cnt_msg_idef = $row_cnt_msg_qu["qeform_id"];
							$cnt_msg_name = $row_cnt_msg_qu["qe_name"];
							$cnt_msg_email = $row_cnt_msg_qu["qe_email"];
							$cnt_msg_body = $row_cnt_msg_qu["qe_message"];
							$cnt_msg_date = $row_cnt_msg_qu["qe_date"];
							$cnt_msg_status = $row_cnt_msg_qu["qe_status"];
					
					?>
					<div class="col-md-4 col-12 msgBox">
						<div class="card">
							<div class="card-content">
								<div class="card-body">
									<h4 class="card-title"><?php echo $cnt_msg_name; ?></h4>
									<p class="card-text" style="height:150px;overflow-y:scroll;"><?php echo $cnt_msg_body; ?></p>
								</div>
							</div>
							<div class="card-footer d-flex justify-content-between">
								<!--<button class="btn btn-outline-primary onBtn" MsgID="<?php echo $cnt_msg_idef; ?>" onclick="toggleOn()">Read</button>
								<button class="btn btn-outline-primary offBtn" MsgID="<?php echo $cnt_msg_idef; ?>" onclick="toggleOff()">Unread</button>-->
								<button class="btn btn-outline-danger delMsgBtn" actualID="<?php echo $cnt_msg_idef; ?>">Delete</button>
							</div>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">Email: <?php echo $cnt_msg_email; ?></li>
								<li class="list-group-item">Message Updated <time class="timeago" datetime="<?php echo $cnt_msg_date; ?>"></time></li>
							</ul>
						</div>
						
					</div>
					<?php }} ?>
					
					<hr />
					<div class="col-lg-12">
						<!-- pagination -->
						<center>
							<h3><?php include("qe_pagination.php"); ?></h3>
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
	$("body").delegate(".delMsgBtn","click",function(){
		var delButtonID = $(this).attr("actualID");
		var el = this;
		if(confirm("Confirm Delete!")){
			$.ajax({
				type:"POST",
				url:"delete_qeFormMsg.php",
				data: { contMsg_idef_val: delButtonID },
				success:function(new_entry){
					$(el).closest(".msgBox").css("background","skyblue");
					$(el).closest(".msgBox").fadeOut(800,function(){
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

<script>
function toggleOn() {
	$("body").delegate(".onBtn","click",function(){
		var conButtonID = $(this).attr("MsgID");
		$.ajax({
			type:"POST",
			url:"setFormDataToRead.php",
			data: { contact_idef_val: conButtonID },
			success:function(new_entry){
				swal({
				  title: new_entry,
				  text: "Thanks for Using Shoot At Sight!",
				  icon: "success",
				  button: "Click to Continue!",
				});
				$("#message_toggle"+conButtonID+"").bootstrapToggle("on");
			}
		});
	});
}
	
function toggleOff() {
	$("body").delegate(".offBtn","click",function(){
		var conButtonID = $(this).attr("MsgID");
		$.ajax({
			type:"POST",
			url:"setFormDataToUnread.php",
			data: { contact_idef_val: conButtonID },
			success:function(new_entry){
				swal({
				  title: new_entry,
				  text: "Thanks for Using Shoot At Sight!",
				  icon: "success",
				  button: "Click to Continue!",
				});
				$("#message_toggle"+conButtonID+"").bootstrapToggle("off");
			}
		});
	});
}
</script>

<?php include("includes/footer.php"); ?>
</body>
</html>
<?php } ?>