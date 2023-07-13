<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// alert("success");
// die();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'autoload.php';

require_once "PHPMailer/PHPMailer.php";
require_once "PHPMailer/SMTP.php";
require_once "PHPMailer/Exception.php";

if (isset($_POST['name']) && isset($_POST['email'])) {
    $name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$service_code   = $_POST['service_code'];
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

	$string_convert = $service_code;
	$service_code   = strval($string_convert);
	
	$custmail = new PHPMailer(TRUE);

		// $custmail->isSMTP();
		// // $custmail->Mailer = "smtp";
		// $custmail->SMTPDebug  = 1;
		// $custmail->SMTPAuth   = TRUE;
		// $custmail->SMTPSecure = "ssl";
		// $custmail->Port       = 465;
		// $custmail->Host       = "smtp.gmail.com";
		// $custmail->Username   = "legalraastatech3@gmail.com";
		
		$custmail->isSMTP();
		$custmail->SMTPDebug  = 1;
		$custmail->Host = "smtp.gmail.com";
		$custmail->SMTPAuth = true;
		$custmail->Username   = "testlegal125@gmail.com";
		$custmail->Password ="ilgzsoockkqrkhyc";
		$custmail->Port = 465;
		$custmail->SMTPSecure = "ssl";
		//Email Settings
		$custmail->isHTML(true);
		$custmail->setFrom('testlegal125@gmail.com', 'Autofiling.com');
		$custmail->addAddress($_POST['email'], $_POST['name']);
		$custmail->Subject = ucwords("Thank you For Showing Interest In. $service_name[$service_code]");
        if(isset($_POST['service_code']) && $service_code == '001') {
			$Body='<html>
			<body>
				<div>Dear '.$_POST['name'].'
					<p>We wanted to take a moment to thank you for choosing our '. $service_name[$service_code].'. We appreciate the trust you have placed in Autofiling, and we are committed to delivering the highest quality service in setting up your business in Dubai. Additionally, we also provide business setup services in Free Zone, Mainland and Offshore areas. <br>
					We are grateful for the opportunity to work with you and for the positive impact that our License services have had on your business. Your satisfaction is Autofiling’s top priority, and we are dedicated to ensuring that you receive the best possible experience with our company. Click to know about our services and us</p>
				
					<p><strong>About Autofiling:<br></strong>With the goal of providing support for setting up your offshore business anywhere in the world, Autofillings was founded in 2017</p>
					<p class="mb-4">Our services include banking assistance, accounting & auditing, legal administration, LLC formation, tax registration certificate, and assistance for obtaining visas and work permits, among other things. We also specialize in incorporating offshore companies, opening offshore branches, creating trusts in offshore jurisdictions, opening an offshore entity, and opening an offshore entity.</p>
					<p>With almost every imaginable company scenario, our team s expertise has managed virtually every type of business and has assisted clients in operating processes smoothly and effectively.</p>

					<p>Warm regards,<br>Team, Autofiling<br><em></em>
					<p>Contact Us</p>
						Call Us: <a href="tel:+971585606800" data-mce-href="tel:+971585606800">+971585606800</a>&nbsp;|&nbsp; <a href="tel:+918882038525">+918882038525</a>  <br> <br>
						Site:<a href="https://test.legalraasta.com/autofile" data-mce-href="https://test.legalraasta.com/autofile">www.Autofile.com</a><br> <br>
						Head Office :<a href="https://goo.gl/maps/T8roTQnp2RtndkPj6"> N Orange Street, Wilmington <br> Wilmington, Delaware 19801, Delhi </a></p>
							
							<a  href="https://twitter.com/RaastaLegal"
                                aria-label="Twitter"><i class="fab fa-twitter fw-normal"> Twitter</i></a>
                            <a  href="https://www.facebook.com/LRaasta"
                                aria-label="facebook"><i class="fab fa-facebook-f fw-normal"> Facebook</i></a>
                            <a 
                                href="https://www.linkedin.com/company/legalraasta/mycompany/"
                                aria-label="linkedn"><i class="fab fa-linkedin-in fw-normal">Linkedin</i></a>
                            <a href="https://www.instagram.com/legal.raasta/"
                                aria-label="pinterest"><i class="fab fa-pinterest fw-normal"></i>Instagram</a>
				</div>
			</body>
		</html>';
		}else if(isset($_POST['service_code']) && $service_code == '002') {
			$Body='<html>
			<body>
				<div>Dear '.$_POST['name'].'
					<p>We wanted to take a moment to thank you for choosing our '. $service_name[$service_code].'. We appreciate the trust you have placed in Autofiling, and we are committed to delivering the highest quality service in setting up your business in Dubai. Additionally, we also provide business setup services in Free Zone, Mainland and Offshore areas. <br>
					We are grateful for the opportunity to work with you and for the positive impact that our License services have had on your business. Your satisfaction is Autofiling’s top priority, and we are dedicated to ensuring that you receive the best possible experience with our company. Click to know about our services and us</p>
				
					<p><strong>About Autofiling:<br></strong>With the goal of providing support for setting up your offshore business anywhere in the world, Autofillings was founded in 2017</p>
					<p class="mb-4">Our services include banking assistance, accounting & auditing, legal administration, LLC formation, tax registration certificate, and assistance for obtaining visas and work permits, among other things. We also specialize in incorporating offshore companies, opening offshore branches, creating trusts in offshore jurisdictions, opening an offshore entity, and opening an offshore entity.</p>
					<p>With almost every imaginable company scenario, our team s expertise has managed virtually every type of business and has assisted clients in operating processes smoothly and effectively.</p>

					<p>Warm regards,<br>Team, Autofiling<br><em></em>
					<p>Contact Us</p>
						Call Us: <a href="tel:+971585606800" data-mce-href="tel:+971585606800">+971585606800</a>&nbsp;|&nbsp; <a href="tel:+918882038525">+918882038525</a>  <br> <br>
						Site:<a href="https://test.legalraasta.com/autofile" data-mce-href="https://test.legalraasta.com/autofile">www.Autofile.com</a><br> <br>
						Head Office :<a href="https://goo.gl/maps/T8roTQnp2RtndkPj6"> N Orange Street, Wilmington <br> Wilmington, Delaware 19801, Delhi </a></p>
							
							<a  href="https://twitter.com/RaastaLegal"
                                aria-label="Twitter"><i class="fab fa-twitter fw-normal"> Twitter</i></a>
                            <a  href="https://www.facebook.com/LRaasta"
                                aria-label="facebook"><i class="fab fa-facebook-f fw-normal"> Facebook</i></a>
                            <a 
                                href="https://www.linkedin.com/company/legalraasta/mycompany/"
                                aria-label="linkedn"><i class="fab fa-linkedin-in fw-normal">Linkedin</i></a>
                            <a href="https://www.instagram.com/legal.raasta/"
                                aria-label="pinterest"><i class="fab fa-pinterest fw-normal"></i>Instagram</a>
				</div>
			</body>
		</html>';
		}else if(isset($_POST['service_code']) && $service_code == '003') {
			$Body='<html>
			<body>
				<div>Dear '.$_POST['name'].'
					<p>We wanted to take a moment to thank you for choosing our '. $service_name[$service_code].'. We appreciate the trust you have placed in Autofiling, and we are committed to delivering the highest quality service in setting up your business in Dubai. Additionally, we also provide business setup services in Free Zone, Mainland and Offshore areas. <br>
					We are grateful for the opportunity to work with you and for the positive impact that our License services have had on your business. Your satisfaction is Autofiling’s top priority, and we are dedicated to ensuring that you receive the best possible experience with our company. Click to know about our services and us</p>
				
					<p><strong>About Autofiling:<br></strong>With the goal of providing support for setting up your offshore business anywhere in the world, Autofillings was founded in 2017</p>
					<p class="mb-4">Our services include banking assistance, accounting & auditing, legal administration, LLC formation, tax registration certificate, and assistance for obtaining visas and work permits, among other things. We also specialize in incorporating offshore companies, opening offshore branches, creating trusts in offshore jurisdictions, opening an offshore entity, and opening an offshore entity.</p>
					<p>With almost every imaginable company scenario, our team s expertise has managed virtually every type of business and has assisted clients in operating processes smoothly and effectively.</p>

					<p>Warm regards,<br>Team, Autofiling<br><em></em>
					<p>Contact Us</p>
						Call Us: <a href="tel:+971585606800" data-mce-href="tel:+971585606800">+971585606800</a>&nbsp;|&nbsp; <a href="tel:+918882038525">+918882038525</a>  <br> <br>
						Site:<a href="https://test.legalraasta.com/autofile" data-mce-href="https://test.legalraasta.com/autofile">www.Autofile.com</a><br> <br>
						Head Office :<a href="https://goo.gl/maps/T8roTQnp2RtndkPj6"> N Orange Street, Wilmington <br> Wilmington, Delaware 19801, Delhi </a></p>
							
							<a  href="https://twitter.com/RaastaLegal"
                                aria-label="Twitter"><i class="fab fa-twitter fw-normal"> Twitter</i></a>
                            <a  href="https://www.facebook.com/LRaasta"
                                aria-label="facebook"><i class="fab fa-facebook-f fw-normal"> Facebook</i></a>
                            <a 
                                href="https://www.linkedin.com/company/legalraasta/mycompany/"
                                aria-label="linkedn"><i class="fab fa-linkedin-in fw-normal">Linkedin</i></a>
                            <a href="https://www.instagram.com/legal.raasta/"
                                aria-label="pinterest"><i class="fab fa-pinterest fw-normal"></i>Instagram</a>
				</div>
			</body>
		</html>';
		}else if(isset($_POST['service_code']) && $service_code == '004') {
			$Body='<html>
			<body>
				<div>Dear '.$_POST['name'].'
					<p>We wanted to take a moment to thank you for choosing our '. $service_name[$service_code].'. We appreciate the trust you have placed in Autofiling, and we are committed to delivering the highest quality service in setting up your business in Dubai. Additionally, we also provide business setup services in Free Zone, Mainland and Offshore areas. <br>
					We are grateful for the opportunity to work with you and for the positive impact that our License services have had on your business. Your satisfaction is Autofiling’s top priority, and we are dedicated to ensuring that you receive the best possible experience with our company. Click to know about our services and us</p>
				
					<p><strong>About Autofiling:<br></strong>With the goal of providing support for setting up your offshore business anywhere in the world, Autofillings was founded in 2017</p>
					<p class="mb-4">Our services include banking assistance, accounting & auditing, legal administration, LLC formation, tax registration certificate, and assistance for obtaining visas and work permits, among other things. We also specialize in incorporating offshore companies, opening offshore branches, creating trusts in offshore jurisdictions, opening an offshore entity, and opening an offshore entity.</p>
					<p>With almost every imaginable company scenario, our team s expertise has managed virtually every type of business and has assisted clients in operating processes smoothly and effectively.</p>

					<p>Warm regards,<br>Team, Autofiling<br><em></em>
					<p>Contact Us</p>
						Call Us: <a href="tel:+971585606800" data-mce-href="tel:+971585606800">+971585606800</a>&nbsp;|&nbsp; <a href="tel:+918882038525">+918882038525</a>  <br> <br>
						Site:<a href="https://test.legalraasta.com/autofile" data-mce-href="https://test.legalraasta.com/autofile">www.Autofile.com</a><br> <br>
						Head Office :<a href="https://goo.gl/maps/T8roTQnp2RtndkPj6"> N Orange Street, Wilmington <br> Wilmington, Delaware 19801, Delhi </a></p>
							
							<a  href="https://twitter.com/RaastaLegal"
                                aria-label="Twitter"><i class="fab fa-twitter fw-normal"> Twitter</i></a>
                            <a  href="https://www.facebook.com/LRaasta"
                                aria-label="facebook"><i class="fab fa-facebook-f fw-normal"> Facebook</i></a>
                            <a 
                                href="https://www.linkedin.com/company/legalraasta/mycompany/"
                                aria-label="linkedn"><i class="fab fa-linkedin-in fw-normal">Linkedin</i></a>
                            <a href="https://www.instagram.com/legal.raasta/"
                                aria-label="pinterest"><i class="fab fa-pinterest fw-normal"></i>Instagram</a>
				</div>
			</body>
		</html>';
		}else if(isset($_POST['service_code']) && $service_code == '005') {
			$Body='<html>
			<body>
				<div>Dear '.$_POST['name'].'
					<p>We wanted to take a moment to thank you for choosing our '. $service_name[$service_code].'. We appreciate the trust you have placed in Autofiling, and we are committed to delivering the highest quality service in setting up your business in Dubai. Additionally, we also provide business setup services in Free Zone, Mainland and Offshore areas. <br>
					We are grateful for the opportunity to work with you and for the positive impact that our License services have had on your business. Your satisfaction is Autofiling’s top priority, and we are dedicated to ensuring that you receive the best possible experience with our company. Click to know about our services and us</p>
				
					<p><strong>About Autofiling:<br></strong>With the goal of providing support for setting up your offshore business anywhere in the world, Autofillings was founded in 2017</p>
					<p class="mb-4">Our services include banking assistance, accounting & auditing, legal administration, LLC formation, tax registration certificate, and assistance for obtaining visas and work permits, among other things. We also specialize in incorporating offshore companies, opening offshore branches, creating trusts in offshore jurisdictions, opening an offshore entity, and opening an offshore entity.</p>
					<p>With almost every imaginable company scenario, our team s expertise has managed virtually every type of business and has assisted clients in operating processes smoothly and effectively.</p>

					<p>Warm regards,<br>Team, Autofiling<br><em></em>
					<p>Contact Us</p>
						Call Us: <a href="tel:+971585606800" data-mce-href="tel:+971585606800">+971585606800</a>&nbsp;|&nbsp; <a href="tel:+918882038525">+918882038525</a>  <br> <br>
						Site:<a href="https://test.legalraasta.com/autofile" data-mce-href="https://test.legalraasta.com/autofile">www.Autofile.com</a><br> <br>
						Head Office :<a href="https://goo.gl/maps/T8roTQnp2RtndkPj6"> N Orange Street, Wilmington <br> Wilmington, Delaware 19801, Delhi </a></p>
							
							<a  href="https://twitter.com/RaastaLegal"
                                aria-label="Twitter"><i class="fab fa-twitter fw-normal"> Twitter</i></a>
                            <a  href="https://www.facebook.com/LRaasta"
                                aria-label="facebook"><i class="fab fa-facebook-f fw-normal"> Facebook</i></a>
                            <a 
                                href="https://www.linkedin.com/company/legalraasta/mycompany/"
                                aria-label="linkedn"><i class="fab fa-linkedin-in fw-normal">Linkedin</i></a>
                            <a href="https://www.instagram.com/legal.raasta/"
                                aria-label="pinterest"><i class="fab fa-pinterest fw-normal"></i>Instagram</a>
				</div>
			</body>
		</html>';
		}else if(isset($_POST['service_code']) && $service_code == '006') {
			$Body='<html>
			<body>
				<div>Dear '.$_POST['name'].'
					<p>We wanted to take a moment to thank you for choosing our '. $service_name[$service_code].'. We appreciate the trust you have placed in Autofiling, and we are committed to delivering the highest quality service in setting up your business in Dubai. Additionally, we also provide business setup services in Free Zone, Mainland and Offshore areas. <br>
					We are grateful for the opportunity to work with you and for the positive impact that our License services have had on your business. Your satisfaction is Autofiling’s top priority, and we are dedicated to ensuring that you receive the best possible experience with our company. Click to know about our services and us</p>
				
					<p><strong>About Autofiling:<br></strong>With the goal of providing support for setting up your offshore business anywhere in the world, Autofillings was founded in 2017</p>
					<p class="mb-4">Our services include banking assistance, accounting & auditing, legal administration, LLC formation, tax registration certificate, and assistance for obtaining visas and work permits, among other things. We also specialize in incorporating offshore companies, opening offshore branches, creating trusts in offshore jurisdictions, opening an offshore entity, and opening an offshore entity.</p>
					<p>With almost every imaginable company scenario, our team s expertise has managed virtually every type of business and has assisted clients in operating processes smoothly and effectively.</p>

					<p>Warm regards,<br>Team, Autofiling<br><em></em>
					<p>Contact Us</p>
						Call Us: <a href="tel:+971585606800" data-mce-href="tel:+971585606800">+971585606800</a>&nbsp;|&nbsp; <a href="tel:+918882038525">+918882038525</a>  <br> <br>
						Site:<a href="https://test.legalraasta.com/autofile" data-mce-href="https://test.legalraasta.com/autofile">www.Autofile.com</a><br> <br>
						Head Office :<a href="https://goo.gl/maps/T8roTQnp2RtndkPj6"> N Orange Street, Wilmington <br> Wilmington, Delaware 19801, Delhi </a></p>
							
							<a  href="https://twitter.com/RaastaLegal"
                                aria-label="Twitter"><i class="fab fa-twitter fw-normal"> Twitter</i></a>
                            <a  href="https://www.facebook.com/LRaasta"
                                aria-label="facebook"><i class="fab fa-facebook-f fw-normal"> Facebook</i></a>
                            <a 
                                href="https://www.linkedin.com/company/legalraasta/mycompany/"
                                aria-label="linkedn"><i class="fab fa-linkedin-in fw-normal">Linkedin</i></a>
                            <a href="https://www.instagram.com/legal.raasta/"
                                aria-label="pinterest"><i class="fab fa-pinterest fw-normal"></i>Instagram</a>
				</div>
			</body>
		</html>';
		}else if(isset($_POST['service_code']) && $service_code == '007') {
			$Body='<html>
			<body>
				<div>Dear '.$_POST['name'].'
					<p>We wanted to take a moment to thank you for choosing our '. $service_name[$service_code].'. We appreciate the trust you have placed in Autofiling, and we are committed to delivering the highest quality service in setting up your business in Dubai. Additionally, we also provide business setup services in Free Zone, Mainland and Offshore areas. <br>
					We are grateful for the opportunity to work with you and for the positive impact that our License services have had on your business. Your satisfaction is Autofiling’s top priority, and we are dedicated to ensuring that you receive the best possible experience with our company. Click to know about our services and us</p>
				
					<p><strong>About Autofiling:<br></strong>With the goal of providing support for setting up your offshore business anywhere in the world, Autofillings was founded in 2017</p>
					<p class="mb-4">Our services include banking assistance, accounting & auditing, legal administration, LLC formation, tax registration certificate, and assistance for obtaining visas and work permits, among other things. We also specialize in incorporating offshore companies, opening offshore branches, creating trusts in offshore jurisdictions, opening an offshore entity, and opening an offshore entity.</p>
					<p>With almost every imaginable company scenario, our team s expertise has managed virtually every type of business and has assisted clients in operating processes smoothly and effectively.</p>

					<p>Warm regards,<br>Team, Autofiling<br><em></em>
					<p>Contact Us</p>
						Call Us: <a href="tel:+971585606800" data-mce-href="tel:+971585606800">+971585606800</a>&nbsp;|&nbsp; <a href="tel:+918882038525">+918882038525</a>  <br> <br>
						Site:<a href="https://test.legalraasta.com/autofile" data-mce-href="https://test.legalraasta.com/autofile">www.Autofile.com</a><br> <br>
						Head Office :<a href="https://goo.gl/maps/T8roTQnp2RtndkPj6"> N Orange Street, Wilmington <br> Wilmington, Delaware 19801, Delhi </a></p>
							
							<a  href="https://twitter.com/RaastaLegal"
                                aria-label="Twitter"><i class="fab fa-twitter fw-normal"> Twitter</i></a>
                            <a  href="https://www.facebook.com/LRaasta"
                                aria-label="facebook"><i class="fab fa-facebook-f fw-normal"> Facebook</i></a>
                            <a 
                                href="https://www.linkedin.com/company/legalraasta/mycompany/"
                                aria-label="linkedn"><i class="fab fa-linkedin-in fw-normal">Linkedin</i></a>
                            <a href="https://www.instagram.com/legal.raasta/"
                                aria-label="pinterest"><i class="fab fa-pinterest fw-normal"></i>Instagram</a>
				</div>
			</body>
		</html>';
		}else if(isset($_POST['service_code']) && $service_code == '008') {
			$Body='<html>
			<body>
				<div>Dear '.$_POST['name'].'
					<p>We wanted to take a moment to thank you for choosing our '. $service_name[$service_code].'. We appreciate the trust you have placed in Autofiling, and we are committed to delivering the highest quality service in setting up your business in Dubai. Additionally, we also provide business setup services in Free Zone, Mainland and Offshore areas. <br>
					We are grateful for the opportunity to work with you and for the positive impact that our License services have had on your business. Your satisfaction is Autofiling’s top priority, and we are dedicated to ensuring that you receive the best possible experience with our company. Click to know about our services and us</p>
				
					<p><strong>About Autofiling:<br></strong>With the goal of providing support for setting up your offshore business anywhere in the world, Autofillings was founded in 2017</p>
					<p class="mb-4">Our services include banking assistance, accounting & auditing, legal administration, LLC formation, tax registration certificate, and assistance for obtaining visas and work permits, among other things. We also specialize in incorporating offshore companies, opening offshore branches, creating trusts in offshore jurisdictions, opening an offshore entity, and opening an offshore entity.</p>
					<p>With almost every imaginable company scenario, our team s expertise has managed virtually every type of business and has assisted clients in operating processes smoothly and effectively.</p>

					<p>Warm regards,<br>Team, Autofiling<br><em></em>
					<p>Contact Us</p>
						Call Us: <a href="tel:+971585606800" data-mce-href="tel:+971585606800">+971585606800</a>&nbsp;|&nbsp; <a href="tel:+918882038525">+918882038525</a>  <br> <br>
						Site:<a href="https://test.legalraasta.com/autofile" data-mce-href="https://test.legalraasta.com/autofile">www.Autofile.com</a><br> <br>
						Head Office :<a href="https://goo.gl/maps/T8roTQnp2RtndkPj6"> N Orange Street, Wilmington <br> Wilmington, Delaware 19801, Delhi </a></p>
							
							<a  href="https://twitter.com/RaastaLegal"
                                aria-label="Twitter"><i class="fab fa-twitter fw-normal"> Twitter</i></a>
                            <a  href="https://www.facebook.com/LRaasta"
                                aria-label="facebook"><i class="fab fa-facebook-f fw-normal"> Facebook</i></a>
                            <a 
                                href="https://www.linkedin.com/company/legalraasta/mycompany/"
                                aria-label="linkedn"><i class="fab fa-linkedin-in fw-normal">Linkedin</i></a>
                            <a href="https://www.instagram.com/legal.raasta/"
                                aria-label="pinterest"><i class="fab fa-pinterest fw-normal"></i>Instagram</a>
				</div>
			</body>
		</html>';
		}else if(isset($_POST['service_code']) && $service_code == '009') {
			$Body='<html>
			<body>
				<div>Dear '.$_POST['name'].'
					<p>We wanted to take a moment to thank you for choosing our '. $service_name[$service_code].'. We appreciate the trust you have placed in Autofiling, and we are committed to delivering the highest quality service in setting up your business in Dubai. Additionally, we also provide business setup services in Free Zone, Mainland and Offshore areas. <br>
					We are grateful for the opportunity to work with you and for the positive impact that our License services have had on your business. Your satisfaction is Autofiling’s top priority, and we are dedicated to ensuring that you receive the best possible experience with our company. Click to know about our services and us</p>
				
					<p><strong>About Autofiling:<br></strong>With the goal of providing support for setting up your offshore business anywhere in the world, Autofillings was founded in 2017</p>
					<p class="mb-4">Our services include banking assistance, accounting & auditing, legal administration, LLC formation, tax registration certificate, and assistance for obtaining visas and work permits, among other things. We also specialize in incorporating offshore companies, opening offshore branches, creating trusts in offshore jurisdictions, opening an offshore entity, and opening an offshore entity.</p>
					<p>With almost every imaginable company scenario, our team s expertise has managed virtually every type of business and has assisted clients in operating processes smoothly and effectively.</p>

					<p>Warm regards,<br>Team, Autofiling<br><em></em>
					<p>Contact Us</p>
						Call Us: <a href="tel:+971585606800" data-mce-href="tel:+971585606800">+971585606800</a>&nbsp;|&nbsp; <a href="tel:+918882038525">+918882038525</a>  <br> <br>
						Site:<a href="https://test.legalraasta.com/autofile" data-mce-href="https://test.legalraasta.com/autofile">www.Autofile.com</a><br> <br>
						Head Office :<a href="https://goo.gl/maps/T8roTQnp2RtndkPj6"> N Orange Street, Wilmington <br> Wilmington, Delaware 19801, Delhi </a></p>
							
							<a  href="https://twitter.com/RaastaLegal"
                                aria-label="Twitter"><i class="fab fa-twitter fw-normal"> Twitter</i></a>
                            <a  href="https://www.facebook.com/LRaasta"
                                aria-label="facebook"><i class="fab fa-facebook-f fw-normal"> Facebook</i></a>
                            <a 
                                href="https://www.linkedin.com/company/legalraasta/mycompany/"
                                aria-label="linkedn"><i class="fab fa-linkedin-in fw-normal">Linkedin</i></a>
                            <a href="https://www.instagram.com/legal.raasta/"
                                aria-label="pinterest"><i class="fab fa-pinterest fw-normal"></i>Instagram</a>
				</div>
			</body>
		</html>';
		}else{
            $Body =$Body='<html>
			<body>
				<p>Dear  '.$_POST['name'].',</p>
				<p>Thanks for Submission of this Service </p>
				

				<p>You can also view our <a
						href="https://drive.google.com/file/d/1Tje68gnJ8j-9FP_gbrlfTy3MBEB_6psJ/view?usp=sharing"
						data-mce-href="https://drive.google.com/file/d/1Tje68gnJ8j-9FP_gbrlfTy3MBEB_6psJ/view?usp=sharing">Trademark
						Guidebook</a></p>
				<p><b>LegalRaasta in News: </b><a
						href="https://economictimes.indiatimes.com/small-biz/startups/legalraasta-raises-rs-6-5-crore-in-angel-round/articleshow/51813536.cms"
						data-mce-href="https://economictimes.indiatimes.com/small-biz/startups/legalraasta-raises-rs-6-5-crore-in-angel-round/articleshow/51813536.cms">Economic
						times</a> | <a
						href="https://economictimes.indiatimes.com/small-biz/money/legal-business-consultancy-firm-legalraasta-raises-funds-to-provide-gst-c0mpliance-software-to-more-smes/articleshow/58638228.cms"
						data-mce-href="https://economictimes.indiatimes.com/small-biz/money/legal-business-consultancy-firm-legalraasta-raises-funds-to-provide-gst-c0mpliance-software-to-more-smes/articleshow/58638228.cms">IndiaTimes</a>
					| <a href="https://www.vccircle.com/exclusive-legal-raasta-raises-5-mn-in-series-a-round/"
						data-mce-href="https://www.vccircle.com/exclusive-legal-raasta-raises-5-mn-in-series-a-round/">VCCircle</a>
					| <a href="http://bwdisrupt.businessworld.in/article/Delhi-Based-Startup-LegalRaasta-Raises-5M-in-Series-A-Round-from-Impanix-Capital/12-05-2017-118035/"
						data-mce-href="http://bwdisrupt.businessworld.in/article/Delhi-Based-Startup-LegalRaasta-Raises-5M-in-Series-A-Round-from-Impanix-Capital/12-05-2017-118035/">BusinessWorld</a>
					| <a href="https://www.youtube.com/watch?v=NSIg1XT-KM0&amp;t=1s"
						data-mce-href="https://www.youtube.com/watch?v=NSIg1XT-KM0&amp;t=1s">YouTube</a></p>
				<p><b><br></b>Warm regards,<br>Team, LegalRaasta<br><a
						href="https://www.legalraasta.com/private-limited-company-registration/"
						data-mce-href="https://www.legalraasta.com/private-limited-company-registration/"><i>Company
							formation</i></a><em>&nbsp;|&nbsp;</em><a href="https://www.legalraasta.com/trademark-registration/"
						data-mce-href="https://www.legalraasta.com/trademark-registration/"><i>Trademark</i></a><em>&nbsp;|&nbsp;</em><a
						href="https://www.legalraasta.com/fssai-license/"
						data-mce-href="https://www.legalraasta.com/fssai-license/"><i>Licenses</i></a><em>&nbsp;|&nbsp;</em><a
						href="https://www.legalraasta.com/gst-registration/"
						data-mce-href="https://www.legalraasta.com/gst-registration/"><i>GST</i></a><em> | </em><a
						href="https://www.legalraasta.com/accounting-bookkeeping/"
						data-mce-href="https://www.legalraasta.com/accounting-bookkeeping/"><i>Accounting</i></a><em>&nbsp;&nbsp;</em><i><br></i>M:&nbsp;<a
						href="tel:%2B91%20875%20000%208585" data-mce-href="tel:%2B91%20875%20000%208585">875 000
						8585</a>&nbsp;|&nbsp;<a href="https://www.legalraasta.com/"
						data-mce-href="https://www.legalraasta.com/">legalraasta.com</a><br>* <a
						href="https://www.legalraasta.com/terms-and-conditions/"
						data-mce-href="https://www.legalraasta.com/terms-and-conditions/">Terms &amp; Conditions</a> apply. For
					companies,&gt; 5cr turnover charges are 11,499 (incl. GST).</p>
				<h6 class="western">*If any objection comes to your trademark, the fees will be extra for the further process of
					reply application in the department.</h6>
			</body>
		</html>';
        }
		$custmail->MsgHTML($Body); 
		if(!$custmail->send()) {
		echo 'Message was not sent.';
		echo 'Mailer error: ' . $custmail->ErrorInfo;
		} 

		else {
		echo 'Message has been sent.';
		$status = "success";
			$response = "Email is sent!";
		}
    }

exit(json_encode(array("status" => $status, "response" => $response)));
