<?php # Script 3.7 - index.php #2
#include('includes/header.html');
// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // For processing the login:
    require_once ('./login_functions.inc.php');
    
    // Need the database connection:
    require_once ('./mysqli_connect.php');
    
    // Check the login:
    list ($check, $data) = check_login($dbc, $_POST['email'], $_POST['pass']);
    
    if ($check) { // OK!
        
        // Set the cookies:
        session_start();
        $_SESSION['customer_id']=$data['customer_id'];
        $_SESSION['first_name']=$data['first_name'];
        
        // Redirect:
        $url = absolute_url ('viewCart.php');
        header("Location: $url");
        exit(); // Quit the script.
        
    } else { // Unsuccessful!
        
        // Assign $data to $errors for error reporting
        // in the login_page.inc.php file.
        $errors = $data;
        
    }
    
    mysqli_close($dbc); // Close the database connection.
    
} // End of the main submit conditional.
$page_title = 'Login';
include ('includes/header.html');

// Print any error messages, if they exist:
if (!empty($errors)) {
    echo '<tr><td><h1>Error!</h1>
	<p class="error">The following error(s) occurred:<br />';
    foreach ($errors as $msg) {
        echo " - $msg<br />\n";
    }
    echo '</p><p>Please try again.</p></td></tr>';
}
?>

<div id="wrapper">
  <main> 
<Form action="login.php" method="post">
<table>
<tr>
<td>Email Address:</td>
<td><input type="text" min="1" name="email" size="20" required/></td>
</tr>
<tr>
<td>Password: </td>
<td><input type="password" min="1" name="pass" size="20" required/></td>
</tr>
</table>
<br>
<!-- <input type="submit" value="Login" />-->
<center><input type="image" src="images/login.jpg" alt="Submit Form" width="100" height="50"/></center>
</Form>
   </main> <!-- end of main content -->
  </div>
<?php

include('includes/footer.html');
?>