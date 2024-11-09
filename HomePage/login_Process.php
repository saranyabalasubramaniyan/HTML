<?php # Script 3.7 - index.php #2
include('includes/header.html');
?>
<?php
$email=$_POST["email"];
$password=$_POST["password"];
?>
<div id="wrapper">
  <main> 
  <table border="1">
<tr>
<td>Email Address:</td>
<td><?php echo $email; ?></td>
</tr>
<tr>
<td>Password</td>
<td>PASSWORD VERIFIED</td>
</tr>
</table>
<br>

<p>Login Successful. You are logged in as <?php echo $email; ?></p>
   </main> <!-- end of main content -->
  </div>
<?php

include('includes/footer.html');
?>