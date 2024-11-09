<?php # Script 3.7 - index.php #2

$page_title = 'Infinity!';
include('includes/header.html');
require_once ('./mysqli_connect.php');  
// Call the function:
//create_ad();
?>

<div id="wrapper">
 <main>
 <h2>Attention! Bookworms...</h2>
    <p>Be it academics or thriller or comic novels, find any genre that intersts you...</p> 
<?php
	require_once ('./mysqli_connect.php');

	$q="Select product_id,product_name,price,long_description,category,product_image_name,product_image from product where category='Books' limit 2";
        #echo $q;
	$r = @mysqli_query ($dbc, $q);
	echo '<table>';
	
	$count=0;
	// Fetch and print all the records:
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
	    if($count==0)
	        echo '<tr>';
	        $count=(++$count)%2;
	        echo '<td align="center"><table><tr><td align="center"><a href="prod_details.php?pid=' . $row['product_id'].'"><img src="images/' .$row['product_image'] . '" width="200" height="200"/></a></td></tr></table></td>
            <td><table style="margin-left:auto;margin-right:auto;"><tr><td align="center"><a href="prod_details.php?pid=' . $row['product_id'].'"> ' . $row['product_name'] . '</a></td></tr>
            <tr><td align="center">$'.$row['price'].'</td></tr>
            <tr><td align="center"><a href="addCart.php?pid=' . $row['product_id'].'"><img src="images/addToCart.jpg" width="100" height="50"/></a></td></tr>
            </table>
            </td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>';
	}

	echo '<td align=""><a href="products.php"><img src="images/viewAll.jpg" width="100" height="50"/></a></td></tr>';
	    echo '</table>'; // Close the table.
	mysqli_free_result ($r);
?>
 	
    <h2>Limited Edition Toys!</h2>
    <p>Legos, Disney, Hotwheels, Nerfs and many more....</p>
     
     <?php
	require_once ('./mysqli_connect.php');

	$q="Select product_id,product_name,price,long_description,category,product_image_name,product_image from product where category='Toys' limit 2";
        #echo $q;
	$r = @mysqli_query ($dbc, $q);
	echo '<table>';
	
	$count=0;
	// Fetch and print all the records:
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
	    if($count==0)
	        echo '<tr>';
	        $count=(++$count)%2;
	        echo '<td align="center"><table><tr><td align="center"><a href="prod_details.php?pid=' . $row['product_id'].'"><img src="images/' .$row['product_image'] . '" width="200" height="200"/></a></td></tr></table></td>
            <td><table style="margin-left:auto;margin-right:auto;"><tr><td align="center"><a href="prod_details.php?pid=' . $row['product_id'].'"> ' . $row['product_name'] . '</a></td></tr>
            <tr><td align="center">$'.$row['price'].'</td></tr>
            <tr><td align="center"><a href="addCart.php?pid=' . $row['product_id'].'"><img src="images/addToCart.jpg" width="100" height="50"/></a></td></tr>
            </table>
            </td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>';
	}

	   echo '<td align=""><a href="products.php"><img src="images/viewAll.jpg" width="100" height="50"/></a></td></tr>';
	    echo '</table>'; // Close the table.
	mysqli_free_result ($r);
?>
<!--<img src="images/blocks.jpg" width="250" height="250" alt="Blocks" id="floatright">-->
  	<h2>Games, to go place!</h2>
    <p>Nintendo, Xbox and PS... One stop for all game cards! </p>
    
      <?php
	require_once ('./mysqli_connect.php');

	$q="Select product_id,product_name,price,long_description,category,product_image_name,product_image from product where category='Games' limit 2";
        #echo $q;
	$r = @mysqli_query ($dbc, $q);
	echo '<table>';
	
	$count=0;
	// Fetch and print all the records:
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
	    if($count==0)
	        echo '<tr>';
	        $count=(++$count)%2;
	        echo '<td align="center"><table><tr><td align="center"><a href="prod_details.php?pid=' . $row['product_id'].'"><img src="images/' .$row['product_image'] . '" width="200" height="200"/></a></td></tr></table></td>
            <td><table style="margin-left:auto;margin-right:auto;"><tr><td align="center"><a href="prod_details.php?pid=' . $row['product_id'].'"> ' . $row['product_name'] . '</a></td></tr>
            <tr><td align="center">$'.$row['price'].'</td></tr>
            <tr><td align="center"><a href="addCart.php?pid=' . $row['product_id'].'"><img src="images/addToCart.jpg" width="100" height="50"/></a></td></tr>
            </table>
            </td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>';
	}

	    echo '<td align=""><a href="products.php"><img src="images/viewAll.jpg" width="100" height="50"/></a></td></tr>';
	    echo '</table>'; // Close the table.
	mysqli_free_result ($r);
?>
    
    <h2>Some for your infants as well!!!</h2>
	<p>Well Well Well, you can shop for your tiny tots as well!</p>
	<p>Cribs, play gyms, diapers , clothes, baby approved cutlery, many more..</p>
   </main> <!-- end of main content -->
  </div>
<?php
// Call the function again:
//create_ad();

include('includes/footer.html');
?>