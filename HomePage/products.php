<?php # Script 3.7 - index.php #2
$page_title = 'Infinity-All Products';
include('includes/header.html');
?>
<link href="includes/retail.css" rel="stylesheet">
<div id="wrapper">
  <main> 
<?php
	require_once ('./mysqli_connect.php');
	
	#$q = 'Select product_id,name,description,imageFile,price from product';
	$q='Select product_id,product_name,price,long_description,category,product_image_name,product_image from product';
        #echo $q;
	$r = @mysqli_query ($dbc, $q);
	echo '<table>';
	
	$count=0;
	// Fetch and print all the records:
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
	    if($count==0)
	        echo '<tr>';
	        $count=(++$count)%2;
	        echo '<td align="center"><table><tr><td align="center"><a href="prod_details.php?pid='.$row['product_id'].'"><img src="images/' .$row['product_image'] . '" width="200" height="200"/></a></td></tr></table></td>
            <td><table style="margin-left:auto;margin-right:auto;"><tr><td align="center"><a href="prod_details.php?pid='.$row['product_id'].'"> ' . $row['product_name'] . '</a></td></tr>
            <tr><td align="center">$'.$row['price'].'</td></tr>
            <tr><td align="center"><a href="addCart.php?pid=' . $row['product_id'].'"><img src="images/addToCart.jpg" width="100" height="50"/></a></td></tr>
            </table>
            </td>';
	        if($count==0)
	            echo '</tr><tr><td>&nbsp;</td></tr>';
	}
	if($count!=0)
	    echo '</tr>';
	    echo '</table>'; // Close the table.
	mysqli_free_result ($r);
?>
   </main> <!-- end of main content -->
  </div>
  
<?php

include('includes/footer.html');
?>