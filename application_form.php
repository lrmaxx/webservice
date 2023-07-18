<?php

//  Payment Setup
$var = json_encode($_POST, true);
$sercd = $_POST['servicecode'];
$getp = $_POST['phone'];
$phoneno = ltrim($getp, "0");

file_put_contents("payment_output.txt", date("Y-m-d h:i:sa") . ' ' . $sercd . " , " . $getp . " , " . PHP_EOL, FILE_APPEND);


$name1 = $_POST['name'];
$rs = array("Rs. ", "Rs ", "₹ ");
$cost1 = str_replace($rs, "", $_POST['cost']);
$cost = (float) str_replace(",", "", $cost1);
$name = str_replace("-", " ", $name1);
$email = $_POST['email'];
$phone = $_POST['phone'];
$info = $_POST['info'];
// $url_f = str_replace(".php","/",$_POST['furl'])."?link=".strtolower(str_replace(" ","-",$info));
$url_f = $_POST['furl'];
$url_s = $_POST['surl'];

//  Merchant key here as provided by Payu
$MERCHANT_KEY = "e40T0n"; //old key
//$MERCHANT_KEY = "rjfL35Jv";

// Merchant Salt as provided by Payu
$SALT = "MlzgQH7q";

//$SALT = "w1bw25y6o9";

// End point - change to https://secure.payu.in for LIVE mode
$PAYU_BASE_URL = "https://secure.payu.in";

$action = '';

$posted = array();
if (!empty($_POST)) {
	//print_r($_POST);

	foreach ($_POST as $key => $value) {
		$posted[$key] = $value;

	}
}

$formError = 0;

if (empty($posted['txnid'])) {
	// Generate random transaction id
	$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
	$txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if (empty($posted['hash']) && sizeof($posted) > 0) {
	if (
		empty($posted['key'])
		|| empty($posted['txnid'])
		|| empty($posted['amount'])
		|| empty($posted['firstname'])
		|| empty($posted['email'])
		|| empty($posted['phone'])
		|| empty($posted['productinfo'])
		|| empty($posted['surl'])
		|| empty($posted['furl'])
		|| empty($posted['service_provider'])
	) {
		$formError = 1;
	} else {
		//$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
		$hashVarsSeq = explode('|', $hashSequence);
		$hash_string = '';
		foreach ($hashVarsSeq as $hash_var) {
			$hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
			$hash_string .= '|';
		}

		$hash_string .= $SALT;

		$hash = strtolower(hash('sha512', $hash_string));
		$action = $PAYU_BASE_URL . '/_payment';
	}
} elseif (!empty($posted['hash'])) {
	$hash = $posted['hash'];
	$action = $PAYU_BASE_URL . '/_payment';
}
?>
<html>
  <head>
  <script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      //var payuForm = document.forms.payuForm;
      //payuForm.submit();
    }
  </script>
<style>
#info{margin:5%;}
#info h2{font-weight:400; font-family:Arial; margin-left:2%; margin-bottom:5%;}
#info p{font-family:Arial; margin-top:5%;}
</style>

</head>
<body onload="document.payuForm.submit()">
<!--<body>-->
    <br/>
    <div id="info">
        <center>
          <h2>Please wait while you are being <br>redirected to secure payment gateway.......</h2>
          <img src="loading.gif">
          <p>Please do not refresh or cancel.</p>
        </center>
    </div>
    <?php if ($formError) {?>

<span style="color:red" style="display:none;">Please fill all mandatory fields.</span>
<br/>
<br/>
<?php }?>
<form action="<?php echo $action; ?>" method="post" name="payuForm" style="display:none;">
<input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
<input type="hidden" name="hash" value="<?php echo $hash ?>"/>
<input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
<table>
  <tr>
    <td><b>Mandatory Parameters</b></td>
  </tr>
  <tr>
    <td>Amount: </td>
    <td><input name="amount" value="<?php echo (empty($posted['amount'])) ? $cost : $posted['amount'] ?>" /></td>
    <td>First Name: </td>
    <td><input name="firstname" id="firstname" value="<?php echo (empty($posted['firstname'])) ? $name : $posted['firstname']; ?>" /></td>
  </tr>
  <tr>
    <td>Email: </td>
    <td><input name="email" id="email" value="<?php echo (empty($posted['email'])) ? $email : $posted['email']; ?>" /></td>
    <td>Phone: </td>
    <td><input name="phone" value="<?php echo (empty($posted['phone'])) ? $phone : $posted['phone']; ?>" /></td>
  </tr>
  <tr>
    <td>Product Info: </td>
    <td colspan="3"><textarea name="productinfo"><?php echo (empty($posted['productinfo'])) ? $info : $posted['productinfo'] ?></textarea></td>
  </tr>
  <tr>
    <td>Success URI: </td>
    <td colspan="3"><input name="surl" value="<?php echo (empty($posted['surl'])) ? $url_s : $posted['surl'] ?>" size="64" /></td>
  </tr>
  <tr>
    <td>Failure URI: </td>
    <td colspan="3"><input name="furl" value="<?php echo (empty($posted['furl'])) ? $url_f : $posted['furl'] ?>" size="64" /></td>
  </tr>

  <tr>
    <td colspan="3"><input type="hidden" name="service_provider" value="payu_paisa" size="64" /></td>
  </tr>

  <tr>
    <td><b>Optional Parameters</b></td>
  </tr>
  <tr>
    <td>Last Name: </td>
    <td><input name="lastname" id="lastname" value="<?php echo (empty($posted['lastname'])) ? '' : $posted['lastname']; ?>" /></td>
    <td>Cancel URI: </td>
    <td><input name="curl" value="<?php echo (empty($posted['furl'])) ? $url_f : $posted['furl'] ?>" /></td>
  </tr>
  <tr>
    <td>Address1: </td>
    <td><input name="address1" value="<?php echo (empty($posted['address1'])) ? '' : $posted['address1']; ?>" /></td>
    <td>Address2: </td>
    <td><input name="address2" value="<?php echo (empty($posted['address2'])) ? '' : $posted['address2']; ?>" /></td>
  </tr>
  <tr>
    <td>City: </td>
    <td><input name="city" value="<?php echo (empty($posted['city'])) ? '' : $posted['city']; ?>" /></td>
    <td>State: </td>
    <td><input name="state" value="<?php echo (empty($posted['state'])) ? '' : $posted['state']; ?>" /></td>
  </tr>
  <tr>
    <td>Country: </td>
    <td><input name="country" value="<?php echo (empty($posted['country'])) ? '' : $posted['country']; ?>" /></td>
    <td>Zipcode: </td>
    <td><input name="zipcode" value="<?php echo (empty($posted['zipcode'])) ? '' : $posted['zipcode']; ?>" /></td>
  </tr>
  <tr>
    <td>UDF1: </td>
    <td><input name="udf1" value="<?php echo (empty($posted['udf1'])) ? '' : $posted['udf1']; ?>" /></td>
    <td>UDF2: </td>
    <td><input name="udf2" value="<?php echo (empty($posted['udf2'])) ? '' : $posted['udf2']; ?>" /></td>
  </tr>
  <tr>
    <td>UDF3: </td>
    <td><input name="udf3" value="<?php echo (empty($posted['udf3'])) ? '' : $posted['udf3']; ?>" /></td>
    <td>UDF4: </td>
    <td><input name="udf4" value="<?php echo (empty($posted['udf4'])) ? '' : $posted['udf4']; ?>" /></td>
  </tr>
  <tr>
    <td>UDF5: </td>
    <td><input name="udf5" value="<?php echo (empty($posted['udf5'])) ? '' : $posted['udf5']; ?>" /></td>
    <td>PG: </td>
    <td><input name="pg" value="<?php echo (empty($posted['pg'])) ? '' : $posted['pg']; ?>" /></td>
  </tr>
  <tr>
    <?php if (!$hash) {?>
      <td colspan="4"><input type="submit" value="Submit" /></td>
    <?php }?>
  </tr>
</table>
</form>
</body>
</html>
