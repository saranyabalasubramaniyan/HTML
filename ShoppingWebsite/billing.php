<?php # Script 11.9 - loggedin.php #2
error_reporting(E_ALL ^ E_NOTICE); 
// The user is redirected here from login.php.
session_start();

// If no session value is present, redirect the user:
if (!isset($_SESSION['customer_id'])) {
	require_once ('./login_functions.inc.php');
	$url = absolute_url("login.php");
	header("Location: $url");
	exit();	
}

$page_title = 'Infinity - Billing';

$id=$_SESSION['customer_id'];
require_once ('./mysqli_connect.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    	$errors = array(); // Initialize an error array.

	// Check for a first name:
	if (empty($_POST['cardHolderName'])) {
		$errors['hn'] = 'You forgot to enter your card hold name.';
	} else {
		$hn = mysqli_real_escape_string($dbc, trim($_POST['cardHolderName']));
	}

	$ct=$_POST['cardType'];
	// Check for zip:
	if (empty($_POST['cardNumber'])) {
		$errors['cn'] = 'You forgot to enter your credit card number.';
	} else {
		$cn = mysqli_real_escape_string($dbc, trim($_POST['cardNumber']));
		if(!preg_match('/^(\d{16})$/',$cn)){
		       $errors['cn'] = 'Invalid card number.';
		       }
	}
        $em=$_POST['expirationMonth'];
        $ey=$_POST['expirationYear'];
        if (empty($_POST['cardIdNumber'])) {
		$errors['sc'] = 'You forgot to enter your security code.';
	} else {
		$security = mysqli_real_escape_string($dbc, trim($_POST['cardIdNumber']));
		if(!preg_match('/^(\d{3})$/',$security)){
		       $errors['sc'] = 'Invalid security code.';
		       }
	}
        if (empty($errors)) { // If everything's OK.
            header("Location:confirm.php");
            exit();
		 } 
      
}
$q = "SELECT * FROM creditcard where customer_id='$id'";
$r = @mysqli_query ($dbc, $q); // Run the query.


?>

<html>
<head>
<!-- <title>Magnolia Food Express Checkout: Choose Shipping Address</title>
<link rel="stylesheet" href="includes/style1.css" type="text/css" media="screen" />-->
<link href="includes/retail.css" rel="stylesheet">
<?php include ('includes/header.html');
$page_title = 'Infinity-Shipping';
?>
</head>
<body>
<div id="header">
<main>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="100%" height="28" bgcolor="#7822b7"></td>
<td width="300" height="28" bgcolor="#7822b7"><img src="images/CheckoutBilling.gif" width="300" height="28" alt="(1) Shipping"></td>
<td width="110" height="28" bgcolor="#7822b7"><img src="images/CheckoutSecureTop.gif" alt="secure" width="110" height="28"></td>
</tr>
<tr>
<td width="100%" bgcolor="#52dceb"></td>
<td width="300" bgcolor="#52dceb"></td>
<td width="110" bgcolor="#52dceb"><img src="images/CheckoutSecureBottom.gif" width="110" height="24" alt="Secure Shopping"></td>
</tr>
</table>
<h2>Enter credit card details</h2>
<table><tr><td>
<table border="0" cellspacing="6" cellpadding="0">
 <?php echo  '<form action="billing.php" method="post">'?>
<tr>
<td align="left"> Cardholder Name
			</td>
<td><input type="text" name="cardHolderName" value="" size="25" maxlength="30" autocomplete="off"></td>
</tr>
<tr><td>&nbsp</td></tr>
<tr>
<td><?php if(!empty($errors['hn']))echo $errors['hn'];?></td>
</tr>
<tr>
<td align="left"> Card Type
					</td>
<td><select name="cardType"><option value="Visa">Visa</option>
<option value="Master Card">MasterCard</option>
<option value="American Express">American Express</option>
<option value="Discover">Discover</option></select></td>
</tr>
<tr><td>&nbsp</td></tr>
<tr>
<td align="left"> Credit Card Number 																									</td>
<td><input type="text" name="cardNumber" size="19" maxlength="20" autocomplete="off"></td>
</tr>
<tr><td>&nbsp</td></tr>
<tr><?php if(!empty($errors['cn']))echo $errors['cn'];?></tr>
<tr>
<td align="left"> Card Identification Number
			</td>
<td><input type="text" name="cardIdNumber" size="4" maxlength="4" autocomplete="off"><img src="images/visaAmTwo_102x31.gif" width="102" height="31" align="ABSmiddle" alt="visa card"></td>
</tr>
<tr><?php if(!empty($errors['sc']))echo $errors['sc'];?></tr>
<tr>
<tr><td>&nbsp</td></tr>
<td align="left"> Expiration Date																												</td>
<td><select name="expirationMonth" ><option value="1">1
																			</option>
<option value="2">2
</option>
<option value="3">3
</option>
<option value="4">4
</option>
<option value="5">5
</option>
<option value="6">6
</option>
<option value="7">7
</option>
<option value="8">8
</option>
<option value="9">9
</option>
<option value="10">10
</option>
<option value="11">11
</option>
<option value="12">12
</option></select><select name="expirationYear"><option value="2009">2009</option>
<option value="2010">2010</option>
<option value="2011">2011</option>
<option value="2012">2012</option>
<option value="2013">2013</option>
<option value="2014">2014</option>
<option value="2015">2015</option>
<option value="2016">2016</option>
<option value="2017">2017</option>
<option value="2018">2018</option>
<option value="2019">2019</option>
<option value="2020">2020</option>
<option value="2021">2021</option>
<option value="2022">2022</option>
<option value="2023">2023</option>
<option value="2024">2024</option>
<option value="2025">2025</option>
<option value="2026">2026</option>
<option value="2027">2027</option>
<option value="2028">2028</option>
<option value="2029">2029</option></select></td>
</tr>
<tr><td>&nbsp</td></tr>
<tr>
<td></td>
<td align="left"><input type="image" src="images/makePayment.jpg" width="122" height="30" border="0" alt="Use this Address"></td>
</tr>
<tr><td>&nbsp</td></tr>
</form>
</table>
        </td></tr></table>
</body>
</html>
<?php 
// Include the footer:
include ('includes/footer.html');
?>