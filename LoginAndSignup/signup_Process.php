<?php # Script 3.7 - index.php #2
include('includes/header.html');
?>
<?php
$fname=$_POST["fname"];
$lname=$_POST["lname"];
$email=$_POST["email"];
$password1=$_POST["password1"];
$password2=$_POST["password2"];
?>
<div id="wrapper">
  <main> 
  <table border="1">
<tr>
<td>First Name:</td>
<td><?php echo $fname; ?></td>
</tr>
<tr>
<td>Last Name:</td>
<td><?php echo $lname; ?></td>
</tr>
<tr>
<td>Email Address:</td>
<td><?php echo $email; ?></td>
</tr>
<tr>
<td>Password :</td>
<td>PASSWORD SET</td>
<tr>
<td>Confirm Password:</td>
<td></td>
</tr>
</table>
<br>

<p>You are signing up as <?php echo $fname; $lname; ?></p>
<p>Your login email address is <?php echo $email; ?></p>
   </main> <!-- end of main content -->
  </div>
<?php

include('includes/footer.html');
?>