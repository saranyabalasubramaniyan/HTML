<?php
include ('includes/header.html');
$page_title = 'Infinity-Cart_Updated';
?>
<div>
<main>
<?php 
if(isset($_GET['pid']) && is_numeric($_GET['pid'])){
   $pid=(int)$_GET['pid'];
   if(isset($_SESSION['cart'][$pid])){
       $_SESSION['cart'][$pid]['quantity']++;
   }
   else{
       $_SESSION['cart'][$pid]['quantity']=1;
   }
   echo "<td>";
   echo "</td>";
echo "<td>The item is added to your cart!</td>";
}
else{
echo "<td>Not a valid item!</td>";
}
?>
</main>
</div>
<?php 
 // Include the footer:
include ('includes/footer.html');
?>
