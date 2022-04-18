<?php
//Include the database configuration file
include("../includes/database.php");

if(isset($_POST["admin_idef"])){

	$admin_idef = $_POST["admin_idef"];
	$homepg_idef = $_POST["homepg_idef"];
	
	$grb_hmpg_title1 = $_POST["grb_hmpg_title1"];
	$grb_web_keywrd1 = $_POST["grb_web_keywrd1"];
	$grb_pg_title1 = $_POST["grb_pg_title1"];
	$grb_web_desc1 = $_POST["grb_web_desc1"];
	$grb_pg_whatsapp1 = $_POST["grb_pg_whatsapp1"];
	
	$que_proins = "UPDATE modify_home_page set home_page_title='$grb_hmpg_title1', page_title='$grb_pg_title1', website_keyword='$grb_web_keywrd1', whatsapp='$grb_pg_whatsapp1', website_description='$grb_web_desc1' where admin_id='$admin_idef' AND home_page_id='$homepg_idef'";
	$run_proins = mysqli_query($con, $que_proins);
	
	if($run_proins){
		echo "Update Successful!";
	}else{
		echo "There Was A Problem!!!";
	}
	
}
?>