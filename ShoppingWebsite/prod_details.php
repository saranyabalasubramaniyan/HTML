
<?php
$page_title = 'Infinity!';
include ('includes/header.html');
?>

<link href="includes/retail.css" rel="stylesheet">
<div id="wrapper">
  <main> 
<?php
// Need the database connection:
require_once ('./mysqli_connect.php');

// Determine how many pages there are...
if (isset($_GET['pid']) && is_numeric($_GET['pid'])) { // Already been determined.

	$pid = $_GET['pid'];

} 
$q = "SELECT * FROM product where product_id=$pid";
$r = @mysqli_query ($dbc, $q); // Run the query.

// Fetch and print all the records:
$row = mysqli_fetch_array($r, MYSQLI_ASSOC);

echo '<table><tr>';
#echo '<td align="left"><table><tr><td align="center"><img src="images/' .$row['product_image'] . '" width="200" height="200"/></td></tr></table></td>';
echo '<td align="center"><img src="images/' .$row['product_image'] . '" width="300" height="300"/></td>';
echo '<td><table><tr><td align="right"><a href="products.php"><img src="images/viewProducts.jpg" width="100" height="50"/></a></td></tr>';
echo '<tr><td align="left"><h3><u>' . $row['product_name'] . '</u></h3></td></tr>';
echo '<tr><td><i>'.$row['category'].'</i></td></tr>';
echo '<tr><td>&nbsp;</td></tr>';
echo '<tr><td>$'.$row['price'].'</td></tr>';
echo '<tr><td>&nbsp;</td></tr>';
echo '<tr><td>'.$row['long_description'].'</td></tr>';
echo '<tr><td><a href="addCart.php?pid=' . $row['product_id'].'"><img src="images/addToCart.jpg" width="100" height="50"/></a></td></tr></table></td>';
echo '</tr></table>';

mysqli_free_result ($r);
?>
   </main> <!-- end of main content -->
  </div>
  
<?php // Include the footer:
include ('includes/footer.html');
?>
