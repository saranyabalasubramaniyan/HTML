<?php # Script 3.7 - index.php #2
include('includes/header.html');
?>

<div id="wrapper">
  <main> 
<Form action="login_Process.php" method="post">
<table border="1">
<tr>
<td>Email Address:</td>
<td><input type="text" min="1" name="email" size="20" required/></td>
</tr>
<tr>
<td>Password: </td>
<td><input type="password" min="1" name="password" size="20" required/></td>
</tr>
</table>
<br>
<input type="submit" value="Login" />
</Form>
   </main> <!-- end of main content -->
  </div>
<?php

include('includes/footer.html');
?>