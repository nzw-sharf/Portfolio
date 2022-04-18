<?php
//Include the database configuration file
include("../includes/database.php");

if(isset($_POST["send_idef_val"])){

	$send_idef_val = $_POST["send_idef_val"];

	$query3 = "delete from project_images where image_id = '$send_idef_val'";

	if(mysqli_query($con, $query3)){
		echo "Image Has Been Deleted Successfully!";
	}
	
}
?>