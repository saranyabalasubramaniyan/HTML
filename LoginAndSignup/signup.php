<?php # Script 3.7 - index.php #2
include('includes/header.html');
?>

<div id="wrapper">
  <main> 
<Form action="signup_Process.php" method="post">
<table border="1">
<tr>
<td>First Name:</td>
<td><input type="text" min="1" name="fname" size="20" required/></td>
</tr>
<tr>
<td>Last Name:</td>
<td><input type="text" min="1" name="lname" size="20" required/></td>
</tr>
<tr>
<td>Email Address:</td>
<td><input type="text" min="1" name="email" size="20" required/></td>
</tr>
<tr>
<td>Password :</td>
<td><input type="password" min="1" name="password1" size="20" required/></td>
</tr>
<tr>
<td>Confirm Password:</td>
<td><input type="password" min="1" name="password2" size="20" required/></td>
</tr>
</table>
<br>
<input type="submit" value="Sign up" />
</Form>
   </main> <!-- end of main content -->
  </div>
<?php

include('includes/footer.html');
?>