<?php

$query = "select * from quick_enquiry ORDER BY 1 DESC";
$result = mysqli_query($con, $query);

//Count the total records
$total_posts = mysqli_num_rows($result);

//use ceil function to divide the total records per page
$total_pages = ceil($total_posts / $per_page);

if(isset($_GET['page'])){
	$page = preg_replace('#[^0-9]#', '', $_GET['page']);
}

if ($page < 1) { 
    $page = 1; 
} else if ($page > $total_pages) { 
    $page = $total_pages; 
}

if($total_pages != 1){
	if($page > 1){
		$prev = $page - 1;
		$prev = preg_replace('#[^0-9]#', '', $prev);
		
		//Going to the previous page
		echo "<span id='page'><a href='quick_enquiry_form.php?page=$prev'><<< </a></span> &nbsp;";
		
		for($i = $page - 3; $i < $page; $i++){
			$i = preg_replace('#[^0-9]#', '', $i);
			if($i > 0){
				echo "<span id='page'><a href='quick_enquiry_form.php?page=$i'> $i </a></span> &nbsp;";
				
			}
		}
		
	}echo "<span>$page</span> &nbsp;";
	
	for($i = $page + 1; $i <= $total_pages; $i++){
		$i = preg_replace('#[^0-9]#', '', $i);
		echo "<span id='page'><a href='quick_enquiry_form.php?page=$i'> $i </a></span> &nbsp;";
		if($i >= $page + 3){
			break;
		}
	}
	
	if ($page != $total_pages) {
        $next = $page + 1;
		$next = preg_replace('#[^0-9]#', '', $next);
        echo "<span id='page'><a href='quick_enquiry_form.php?page=$next'> >>> </a></span>";
    }
	
}
mysqli_close($con);
?>