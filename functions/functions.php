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

$wiscoy_fullname = $get_my_admin_row["company_fullname"];
$wiscoy_url = $get_my_admin_row["company_url"];
$wiscoy_title = $get_my_admin_row["company_title"];
$wiscoy_tagline = $get_my_admin_row["company_tagline"];
$wiscoy_address = $get_my_admin_row["company_address"];
$wiscoy_address_2 = $get_my_admin_row["company_address_2"];
$wiscoy_email1 = $get_my_admin_row["company_email_1"];
$wiscoy_email2 = $get_my_admin_row["company_email_2"];
$wiscoy_phone1 = $get_my_admin_row["company_phone_1"];
$wiscoy_phone2 = $get_my_admin_row["company_phone_2"];

//Dynamic Links home page
$get_my_homepg_qu = "SELECT * FROM modify_home_page ORDER BY home_page_id ASC LIMIT 0,1";
$get_my_homepg = mysqli_query($con, $get_my_homepg_qu);
$get_my_homepg_row = mysqli_fetch_array($get_my_homepg);

$wiscoy_home_page_title = $get_my_homepg_row["home_page_title"];
$wiscoy_page_title = $get_my_homepg_row["page_title"];
$wiscoy_page_img = $get_my_homepg_row["page_image_url"];
$wiscoy_location_url = $get_my_homepg_row["company_location"];
$wiscoy_home_page_scrolling_text = $get_my_homepg_row["scrolling_text"];
$wiscoy_whatsapp = $get_my_homepg_row["whatsapp"];
$wiscoy_web_keyword = $get_my_homepg_row["website_keyword"];
$wiscoy_web_desc = $get_my_homepg_row["website_description"];

//Dynamic Links social links
$get_my_soclink_qu = "SELECT * FROM social_links ORDER BY social_link_id ASC LIMIT 0,1";
$get_my_soclink = mysqli_query($con, $get_my_soclink_qu);
$get_my_soclink_row = mysqli_fetch_array($get_my_soclink);

$wiscoy_facebook = $get_my_soclink_row["facebook_link"];
$wiscoy_twitter = $get_my_soclink_row["twitter_link"];
$wiscoy_instagram = $get_my_soclink_row["instagram_link"];
$wiscoy_gplus = $get_my_soclink_row["gplus_link"];
$wiscoy_linkedin = $get_my_soclink_row["linkedin_link"];
$wiscoy_youtube = $get_my_soclink_row["youtube_link"];

$home_page_title = $wiscoy_home_page_title;
$page_title = $wiscoy_page_title;
$page_image = $wiscoy_page_img;
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
$comp_phone_2 = $wiscoy_phone2;
$comp_email = $wiscoy_email1;
$comp_email_2 = $wiscoy_email2;
$comp_location = $wiscoy_location_url;

$comp_address = $wiscoy_address;
$comp_address_2 = $wiscoy_address_2;
$scrolling = $wiscoy_home_page_scrolling_text;

$soc_link_facebook = $wiscoy_facebook;
$soc_link_twitter = $wiscoy_twitter;
$soc_link_instagram = $wiscoy_instagram;
$soc_link_googleplus = $wiscoy_gplus;
$soc_link_linkedin = $wiscoy_linkedin;
$soc_link_youtube = $wiscoy_youtube;
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

function number_format_short( $n, $precision = 1 ) {
	if ($n < 900) {
		// 0 - 900
		$n_format = number_format($n, $precision);
		$suffix = '';
	} else if ($n < 900000) {
		// 0.9k-850k
		$n_format = number_format($n / 1000, $precision);
		$suffix = 'K';
	} else if ($n < 900000000) {
		// 0.9m-850m
		$n_format = number_format($n / 1000000, $precision);
		$suffix = 'M';
	} else if ($n < 900000000000) {
		// 0.9b-850b
		$n_format = number_format($n / 1000000000, $precision);
		$suffix = 'B';
	} else {
		// 0.9t+
		$n_format = number_format($n / 1000000000000, $precision);
		$suffix = 'T';
	}

  // Remove unecessary zeroes after decimal. "1.0" -> "1"; "1.00" -> "1"
  // Intentionally does not affect partials, eg "1.50" -> "1.50"
	if ( $precision > 0 ) {
		$dotzero = '.' . str_repeat( '0', $precision );
		$n_format = str_replace( $dotzero, '', $n_format );
	}

	return $n_format . $suffix;
}

?>