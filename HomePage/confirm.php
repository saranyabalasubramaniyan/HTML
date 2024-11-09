<?php # Script 11.9 - loggedin.php #2
session_start();
// If no session customer_id is present, redirect the user login page:
if (!isset($_SESSION['customer_id'])) {
	require_once ('./login_functions.inc.php');
	$url = absolute_url("login.php");
	header("Location: $url");
	exit();	
}

$page_title = 'Infinity - Billing';
$id=$_SESSION['customer_id'];

require_once ('./mysqli_connect.php');
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
<td width="100%" height="28" bgcolor="#ff9900"></td>
<td width="300" height="28" bgcolor="#ff9900"><img src="images/CheckoutPlaceOrder.gif" width="300" height="28" alt="(1) Shipping"></td>
<td width="110" height="28" bgcolor="#ff9900"><img src="images/CheckoutSecureTop.gif" alt="secure" width="110" height="28"></td>
</tr>
<tr>
<td width="100%" bgcolor="#ffcc00"></td>
<td width="300" bgcolor="#ffcc00"></td>
<td width="110" bgcolor="#ffcc00"><img src="images/CheckoutSecureBottom.gif" width="110" height="24" alt="Secure Shopping"></td>
</tr></table>
<div align="center">
    <a href="Thankyou.php"><img src="images/btnPlaceOrder.gif" alt="Place order"></a>
</div>

    <h2>Here is what your ordered:</h2>
    <?php
    if (!empty($_SESSION['cart'])) {

   $q="SELECT * FROM product where product_id IN (";
   foreach($_SESSION['cart'] as $pid=>$value){
       $q .=$pid.',';
   }
   $q=substr($q,0,-1).')';
   $r=mysqli_query($dbc,$q);

   //create a form and a table:
   echo '<form action="confirm.php" method="post">
        <table border="1" align="center">
     <tr>
     	<td align="left" width="15%"><b>Name</b></td>
		<td align="left" width="40%"><b>Description</b></td>
		<td align="right" width="15%"><b>Price</b></td>
		<td align="center" width="15%"><b>Qty</b></td>
		<td align="right" width="15%"><b>Total Price</b></td>
	  </tr>
     ';

	// Print each item...
	$total = 0; // Total cost of the order.
	while ($row = mysqli_fetch_array ($r, MYSQLI_ASSOC)) {

		// Calculate the total and sub-totals.
		$subtotal = $_SESSION['cart'][$row['product_id']]['quantity'] * $row['price'];
		$total += $subtotal;

		// Print the row.
		echo "\t<tr>
		<td align=\"left\">{$row['name']}</td>
		<td align=\"left\">{$row['description']}</td>
		<td align=\"right\">\${$row['price']}</td>
		<td align=\"center\"><input type=\"text\" size=\"3\" name=\"qty[{$row['product_id']}]\" value=\"{$_SESSION['cart'][$row['product_id']]['quantity']}\" /></td>
		<td align=\"right\">$" . number_format ($subtotal, 2) . "</td>
   	</tr>\n";

	  } // End of the WHILE loop.

	
	// Print the footer, close the table, and the form.
	echo '<tr>
		<td colspan="4" align="right"><b>Total:</b></td>
		<td align="right">$' . number_format ($total, 2) . '</td>
	</tr>
	</table>
	<div align="center"><input type="submit" name="submit" value="Update My Cart" /></div>
	<input type="hidden" name="submitted" value="TRUE" />
	</form><p align="center">Enter a quantity of 0 to remove an item.
	<br /><br /></p>';

 } else {
	echo '<p>Your cart is currently empty.</p>';
 }

	
?>
    <div align="center">
     <a href="Thankyou.php"><img src="images/btnPlaceOrder.gif" alt=""Place order"></a>
</div>
</body>
</html>
<?php 
// Include the footer:
include ('includes/footer.html');
?>