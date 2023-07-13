
<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

print_r($_POST);
// 	die();


if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['contact'])) {
	header('Location: /');
	die();
}
$name = urldecode($_POST['name']);
$redirect = $_POST['redirect'];

// print_r($redirect);
// die();
function validateInput() {
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;

	}

	// $name = test_input($_POST['name']);
	// if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
	//  header('Location: /');
	//  die();
	// }

	// validate email
	$email = test_input($_POST['email']);
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header('Location: /');
		die();
	}

	$mobile = test_input($_POST['contact']);
	$mobile = str_replace(' ', '', $mobile);
	if (substr($mobile, 0, 1) == '0') {
		echo $mobile = substr($mobile, 1);
	}

	if (!preg_match('/^(\+91[\-\s]?)?[0]?(91)?[6-9]\d{9}$/', $mobile)) {
		header('Location: /');
		die();
	}

	// $_POST['name'] = $name;
	$_POST['email'] = $email;
	$_POST['contact'] = $mobile;
}
header('Location: thanks.html');
validateInput();

if (!empty($_POST['ref']) && isset($_POST['ref'])) {
	$referralUrl = $_POST['ref'];
} else {
	$referralUrl = $_SERVER['HTTP_HOST'];
}

$Data = array(
	"fields" => array(
		'TITLE' => $_POST['title'],
		//'COMPANY_TITLE' => $_POST['Regcompany'],
		'NAME' => $name,
		"EMAIL" => [["VALUE" => $_POST['email'], "VALUE_TYPE" => "WORK"]],
		"PHONE" => [["VALUE" => $_POST['contact'], "VALUE_TYPE" => "WORK"]],
		'SOURCE_DESCRIPTION' => $referralUrl,
		'ADDRESS_CITY' => $_POST['cityfield'],
		'ASSIGNED_BY_ID' => $_POST['Regresp'],
		'POST' => $_POST['position'],
		'COMMENTS' => $_POST['analytics'],
		// 'UF_CRM_1557731305' => $_POST['cityfield'],
		//'UF_CRM_1574154679032'=>"web.whatsapp.com/send?phone=91".$_POST['contact'],
		'UF_CRM_1557814705' => rand(1, 10),
	),
);
// print_r($Data);
// die();

$leadId = bitrix_funtion($Data, '');

if (!empty($leadId) && !empty($redirect)) {
	header('Location:'. $redirect . '?name=' . $name . '&phone=' . $_POST['contact'] . '&email=' . $_POST['email'].'&servicecode='.$_POST['service_code']);
	//echo $leadId;
	// header('Location: ' . $_POST['redirect'] . '?name=' . $_POST['name'] . '&contact=' . $_POST['contact'] . '&id=' . $leadId . '&email=' . $_POST['email']);
} else {

	header("Location:thanks.html");
}

function bitrix_funtion($postParam, $reqHeaders) {
	$timeout = 600;
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://crm.legalraasta.in/rest/223/dkwxtxkh0ks7zny7/crm.lead.add');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
	curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type:application/json']);
	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/59.0.3071.109 Chrome/59.0.3071.109 Safari/537.36');
	if ($reqHeaders != '') {
		curl_setopt($ch, CURLOPT_HTTPHEADER, $reqHeaders);
	} else {
		curl_setopt($ch, CURLOPT_HEADER, 0);
	}
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
	if ($postParam != '') {
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postParam));
	}
	curl_setopt($ch, CURLOPT_COOKIESESSION, false);
	$responsePage = curl_exec($ch);
	curl_close($ch);
	return json_decode($responsePage)->result;

}


?>


