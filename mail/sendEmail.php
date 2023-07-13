<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'autoload.php';
// require_once "PHPMailer/PHPMailer.php";
// 	require_once "PHPMailer/SMTP.php";
// 	require_once "PHPMailer/Exception.php";


if (isset($_POST['name']) && isset($_POST['email'])) {
	


		$name 			= $_POST['name'];
		$email			= $_POST['email'];
		$phone 			= $_POST['phone'];
		$status 		= $_POST['status'];
		$Age    		= $_POST['age'];
	    $area 		    = $_POST['area'];
		$emp      		= $_POST['emp'];
		$service_code   = $_POST['service_code'];
		$service_name = [
				'001' =>'Trademark-Assignment',
				'002' =>'Private Limited Company Registration',
				'003' =>'Drug License',
				'004' =>'GST Registration',
				'005' =>'FSSAI Food License',
				'006' =>'Limited Liability Partnership (LLP) Registration',
				'007' =>'Trademark Registration',
				'008' =>'Eating House License Registration',
				'009' =>'GST Return Filing Online',
				'010' =>'ISO Registration',
				'011' =>'Conversion of Partnership firm to LLP',
				'012' =>'Convert Private Limited To Public Limited',
				'013' =>'Sole Proprietorship Registration',
				'014' =>'Public Limited Company Registration',
				'015' =>'One Person Company Registration',
				'016' =>'Convert Sole Proprietorship To Private Limited Company',
				'017' =>'Producer Company Registration',
				'018' =>'NBFC License',
				'019' =>'Patent Search',
				'020' =>'Respond To Tax Notice',
				'021' =>'Trademark Renewal',
				'022' =>'Income Tax Return',
				'023' =>'MSME Registration',
				'024' =>'Trademark Objection',
				'025' =>'Trademark Watch Service',
				'026' =>'Trademark Opposition',
				'027' =>'BUY NBFC',
				'028' =>'NGO Registration',
				'029' =>'Indian Subsidiary Registration',
				'030' =>'Section 8 Company Registration',
				'031' =>'Nidhi Company Registration',
				'032' =>'Register Trade License',
				'033' =>'ESI Registration',
				'034' =>'Partnership Registration',
				'035' =>'Employees Provident Fund',
				'036' =>'Professional Tax Registration',
				'037' =>'Increase In Authorised Share Capital',
				'038' =>'Allotment Of Shares',
				'039' =>'GST Software',
				'040' =>'TDS Return',
				'041' =>'Accounting & Bookkeeping Services',
				'042' =>'Copyright Registration',
				'043' =>'ROC Company Compliances',
				'044' =>'Provisional Patent',
				'045' =>'IEC Registration Online',
				'046' =>'LLP Annual Filing',
				'047' =>'Franchise Business Opportunity',
				'048' =>'Company Annual Filing',
				'049' =>'Business Income Return Filing',
				'050' =>'Bulk Return Filing',
				'051' =>'Digital Signature(DSC)',
				'052' =>'Microfinance Company Registration',
				'053' =>'Maintenance Of Minutes',
				'054' =>'Change In Directors',
				'055' =>'TAN Registration',
				'056' =>'Patent Registration',
				'057' =>'Trademark Search'
			];

	// $body = $_POST['body'];


	// print_r($_POST);
	// die();

	// require_once "PHPMailer/PHPMailer.php";
	// require_once "PHPMailer/SMTP.php";
	// require_once "PHPMailer/Exception.php";

	$mail = new PHPMailer(TRUE);

	//SMTP Settings
	
	$mail->isSMTP();

	$mail->SMTPDebug  = 1;
	$mail->Host = "smtp.gmail.com";
	$mail->SMTPAuth = true;
	$mail->Username   = "legalraastatech3@gmail.com";

	$mail->Port = 465;
	$mail->SMTPSecure = "ssl";

	//Email Settings
	$mail->isHTML(true);
	$mail->setFrom($email, $name);
	$mail->addAddress("legalraastatech3@gmail.com","Admin"); //enter you email address
	$mail->Subject = ("New Application Form Submission");
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
		</tr><tr>
		<tr>
			<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Service_Filled</td>
			<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$service_name[$service_code].'</td>
		</tr><tr>
		<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Number of Employees</td>
		<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$emp.'</td>
		</tr>
		<tr>
		<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Age of Business</td>
		<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$Age.'</td>
		</tr>
		<tr>
		<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Business Area/Category</td>
		<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$area.'</td>
		</tr>
		<tr>
		<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Business Status</td>
		<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$status.'</td>
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

	exit(json_encode(array("status" => $status, "response" => $response)));
}
?>
