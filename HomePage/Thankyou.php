<?php # Script 11.9 - loggedin.php #2
session_start(); 
// If no session customer_id is present, redirect the user login:
if (!isset($_SESSION['customer_id'])) {
	require_once ('./login_functions.inc.php');
	$url = absolute_url("login.php");
	header("Location: $url");
	exit();	
}
$id=$_SESSION['customer_id'];
$page_title = 'Check out';
include ('includes/header.html'); // Start the session.

require_once ('./mysqli_connect.php');
$q="Insert into orders(customer_id,order_time) values ($id,NOW())";
$r = @mysqli_query ($dbc, $q); // Run the query.

$od=@mysqli_insert_id($dbc);//xxxx

$q = "SELECT * FROM customers where customer_id=$id";		
$r = @mysqli_query ($dbc, $q); // Run the query.
echo "<td>";
// Count the number of returned rows:
$num = @mysqli_num_rows($r);
$body="You have ordered the following\n";
if ($num == 1){
   if (!empty($_SESSION['cart'])){
      foreach($_SESSION['cart'] as $pid=>$value){
           $qty= $value['quantity'];
           /*$qp = "Select * from product where product_id='$pid'";
		     $rp = @mysqli_query ($dbc, $qp); // Run the query.
		     $rowp = mysqli_fetch_array($rp, MYSQLI_ASSOC);
		     $p=$rowp['price'];*/
		    
           $q = "INSERT INTO orderitem (order_id,product_id,quantity) VALUES ($od, $pid, $qty)";
		     $ri = @mysqli_query ($dbc, $q); // Run the query.
           if (!$ri){
              echo "$q Insertion of order fails!";
              }
           
		     
       }
   echo 'Thank you for your business<br>Your order will shipped soon:<br><br>';
	
	mysqli_free_result ($r);
	}else{
	    echo "Your cart is empty!";
	}
}else{
     echo "Unexpected errors happened!";
}
echo '</td>';


include ('includes/footer.html');
?>

