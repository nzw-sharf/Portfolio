<?php
//Include the database configuration file
include("../includes/database.php");

if(isset($_POST["send_idef_val"])){

	$send_idef_val = $_POST["send_idef_val"];

	$query3 = "delete from services where service_id  = '$send_idef_val'";

	if(mysqli_query($con, $query3)){
		echo "Service Has Been Deleted Successfully!";
	}
	
}
?>