<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include("includes/database.php");

// Load Composer's autoloader
require "PHPMailer/vendor/autoload.php";

if(isset($_POST["contactName2"])){
	
	$contactName = mysqli_real_escape_string($con, $_POST["contactName2"]);
	$contactEmail = mysqli_real_escape_string($con, $_POST["contactEmail2"]);
	$contactMessage = mysqli_real_escape_string($con, $_POST["contactMessage2"]);
	
	$message_status = "unread";

	$mail = new PHPMailer(true);
	$mail->isSMTP();
	$mail->isHTML(true);
    $mail->Host       = "mail.tropicalsuperfoods.ae";
    $mail->SMTPAuth   = true;
    $mail->Username   = "developer@tropicalsuperfoods.ae";
    $mail->Password   = 'MbszOo^C0c$A';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    $mail->setFrom("nazwasharaf@gmail.com", "Nazwa Sharaf - Website Contact Form");
    $mail->addAddress("nazwasharaf@gmail.com", "Nazwa Sharaf - Website Contact Form");
    $mail->addReplyTo($contactEmail, $contactName);

    // Content
    $mail->Subject = "Website Contact Form";
    $mail->Body    = "
			<html>
				<head>
					<style>
						h1, h2, h3, h4, h5, h6, p{
							margin-bottom: 10px;
						}
						hr{
							border-top: 1px solid rgba(0,0,0,0.1);
						}
						body{
                        	background: #f1f1f1;
                        	padding:2%;
                        	margin:auto;
                        	font-family: 'Quicksand', sans-serif;
                        }
                        .center {
                        	margin: auto;
                        	width: 96%;
                        	border: 3px solid #e7e7e7;
                        	padding: 2%;
                        	background: #ffffff;
                        	border-radius: 10px;
                        }
						.wizBtn{
							padding: 14px 20px;
							background: #f0d264;
							color: #333;
							text-decoration: none;
							border-radius: 12px;
							transition: all 1s ease;
						}
						.wizBtn:hover {
						-webkit-box-shadow: 0 .5rem 1rem rgba(0,0,0,.15);
						-moz-box-shadow: 0 .5rem 1rem rgba(0,0,0,.15);
						box-shadow: 0 .5rem 1rem rgba(0,0,0,.15);
						}
						.btnP{
							padding: 30px 0;
						}
					</style>
				</head>
				<body>
					<div class='center'>	
						<img src='https://www.shootatsight.com/assets/images/sas-logo.png' width='50%' alt='nazwa' title='nazwa' style='margin:20px;' />
						<hr />
						
						<h3>Contact Name: $contactName</h3>
						<h3>Contact Email: $contactEmail</h3>
						
						<p>$contactMessage</p>
						
						<h5>Thanks & Regards!</h5><hr />
						<p>Phone: <a href='tel:+971551171248'>+971 55 117 1248</a></p>
						<p>Email: <a href='mailto:info.uae@shootatsight.com'>info.uae@shootatsight.com</a></p>
						<p>Website: <a href='https://www.shootatsight.com/'>www.shootatsight.com</a></p>
						<img src='https://www.shootatsight.com/assets/images/sas-logo.png' width='50%' alt='nazwa' title='nazwa' style='margin:20px;' />
					</div>
				</body>
			</html>
		";
	//send mail ends
    
	if(!$mail->send()){
		echo $mail->ErrorInfo;
	}else{
		$contInfo_query = "insert into quick_enquiry (qe_name, qe_email, qe_message, qe_status, qe_date) values('$contactName','$contactEmail','$contactMessage','$message_status',NOW())";
		$insert_contInfo = mysqli_query($con, $contInfo_query);
		
		if($insert_contInfo){
			echo "success";
		}
	}
	
}
?>