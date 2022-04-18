<?php
//Include the database configuration file
include("../includes/database.php");

if(isset($_POST["contMsg_idef_val"])){

	$contMsg_idef_val = $_POST["contMsg_idef_val"];

	$query3 = "delete from quick_enquiry where qeform_id = '$contMsg_idef_val'";

	if(mysqli_query($con, $query3)){
		echo "Quick Enquiry Form Message Has Been Deleted Successfully!";
	}
	
}
?>