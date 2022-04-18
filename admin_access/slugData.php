<?php

include("../includes/database.php");

if(isset($_POST["send_slugData"])){
	
	$_catTitle = mysqli_real_escape_string($con, $_POST["send_catTitle"]);
	
	//$slug = preg_replace(pattern, replacement, subject)
	//$slugPreg = preg_replace('/[^a-z0-9]+/i', '-', trim(strtolower($_catTitle)));
	$slugPreg = strtolower(trim(preg_replace('/[^A-Za-z0-9]+/', '-', $_catTitle), '-'));
	$_dataSQL = mysqli_query($con, "SELECT category_slug FROM portfolio_category WHERE category_slug LIKE '$slugPreg%'");
	$_cntSlugData = mysqli_num_rows($_dataSQL);
	$_countSlug = $_cntSlugData + 1;
	
	if($_cntSlugData == 0){
		echo $slugPreg;
	}else if($_cntSlugData >= 1){
		echo $slugPreg."-".$_countSlug;
	}
	
}

?>