<?php

$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "nzwPortfolioDb";

$con = mysqli_connect($db_host,$db_user,$db_password,$db_name) or die("Connection was not established");

//Dynamic Links admin
$get_my_admin_qu = "SELECT * FROM admin ORDER BY admin_id ASC LIMIT 0,1";
$get_my_admin = mysqli_query($con, $get_my_admin_qu);
$get_my_admin_row = mysqli_fetch_array($get_my_admin);

$wiscoy_fullname = $get_my_admin_row["admin_fullname"];
$wiscoy_url = $get_my_admin_row["website_url"];
$wiscoy_title = $get_my_admin_row["admin_title"];
$wiscoy_tagline = $get_my_admin_row["admin_tagline"];
$wiscoy_address = $get_my_admin_row["company_address"];
$wiscoy_email1 = $get_my_admin_row["email_address"];
$wiscoy_phone1 = $get_my_admin_row["phone_number"];

//Dynamic Links home page
$get_my_homepg_qu = "SELECT * FROM modify_home_page ORDER BY home_page_id ASC LIMIT 0,1";
$get_my_homepg = mysqli_query($con, $get_my_homepg_qu);
$get_my_homepg_row = mysqli_fetch_array($get_my_homepg);

$wiscoy_home_page_title = $get_my_homepg_row["home_page_title"];
$wiscoy_page_title = $get_my_homepg_row["page_title"];
$wiscoy_whatsapp = $get_my_homepg_row["whatsapp"];
$wiscoy_web_keyword = $get_my_homepg_row["website_keyword"];
$wiscoy_web_desc = $get_my_homepg_row["website_description"];

$home_page_title = $wiscoy_home_page_title;
$page_title = $wiscoy_page_title;
$img_alt = $wiscoy_title;
$img_title = $wiscoy_title;
$website_keywords = $wiscoy_web_keyword;
$website_description = $wiscoy_web_desc;
$website_url = $wiscoy_url;
$whatsapp_dial = $wiscoy_whatsapp;
$comp_fullname = $wiscoy_fullname;
$comp_title = $wiscoy_title;
$comp_tagline = $wiscoy_tagline;
$comp_phone = $wiscoy_phone1;
$comp_email = $wiscoy_email1;
$comp_address = $wiscoy_address;

//Dynamic Links

function getIp(){
	$ip = $_SERVER["REMOTE_ADDR"];
	if(!empty($_SERVER["HTTP_CLIENT_IP"])){
		$ip = $_SERVER["HTTP_CLIENT_IP"];
	}elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
		$ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
	}
	return $ip;
}

$clientIP = getIp();
}

?>