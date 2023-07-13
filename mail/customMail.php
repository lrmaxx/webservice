<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'autoload.php';
// Mail blocker code
// $str = "salescoordintorlr@gmail.com";
// $domainBlacklist = ['gmail.com', 'hotmail.com'];
// $domain = array_shift(explode('@',$str ));
// if(!in_array($domain,$str)){
	if (isset($_POST['name']) && isset($_POST['email'])) {
		
		$name = $_POST['name'];

		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$service_code =$_POST['service_code'];
		$service_name = [
			'001' =>'Contact Us ',
			'002' =>'Nominee Shareholder Service ',
			'003' =>'Offshore Company-Formation ',
			'004' =>'Offshore Bank Account ',
			'005' =>'Employer Identifier Number ',
			'006' =>'S Crop ',
			'007' =>'Corporate Secretrial Service ',
			'008' =>'Account Audit Tax ',
			'009' =>'Doing Business As(DBA)',
		];
		$status="fa";
		$response ="jack";
		
		// $body = $_POST['body'];

		// print_r($_POST);
		// die();

		require_once "PHPMailer/PHPMailer.php";
		require_once "PHPMailer/SMTP.php";
		require_once "PHPMailer/Exception.php";

		$mail = new PHPMailer();

		//SMTP Settings

		// $mail->SMTPDebug  = 1;
		// $mail->Host = "smtp.gmail.com";
		// $mail->SMTPAuth = true;
		// $mail->Username   = "legalraastatech1@gmail.com";
		// $mail->Password   = "kycxlcjyvhoztkrf"; //enter you email password
		// $mail->Port = 465;
		// $mail->SMTPSecure = "ssl";
		$mail->isSMTP();
		$mail->SMTPDebug  = 1;
		$mail->Host = "smtp.gmail.com";
		$mail->SMTPAuth = true;
		$mail->Username   = "testlegal125@gmail.com";
		$mail->Password   = "ilgzsoockkqrkhyc";
		$mail->Port = 465;
		$mail->SMTPSecure = "ssl";


		//Email Settings
		$mail->isHTML(true);
		$mail->setFrom($email, $name);
		$mail->addAddress("testlegal125@gmail.com","Admin"); //enter you email address
		$mail->Subject = ("New Submission");
		$mail->Body = '<html>

			<body>    
				<h2>User Form Data</h2>
				
				<table style="font-family: arial, sans-serif;
				border-collapse: collapse;
				width: 100%;">
				
				<tr>
					<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Name</td>
					<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$name.'</td>
				
				</tr>
				<tr style="background-color: #dddddd;">
					<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Email</td>
					<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$email.'</td>
					
				</tr>
				<tr>
					<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Number</td>
					<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$phone.'</td>
				</tr>
				<tr>
					<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Service Code</td>
					<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$service_code.'</td>
				</tr>
				<tr>
					<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Service Name</td>
					<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$service_name[$service_code].'</td>
				</tr>
				
				</table>
			</body>
			</html>';

		if ($mail->send()) {
			$status = "success";
			$response = "Email is sent!";
		} else {
			$status = "failed";
			$response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
		}

		
	}
// }
exit(json_encode(array("status" => $status, "response" => $response)));
?>
