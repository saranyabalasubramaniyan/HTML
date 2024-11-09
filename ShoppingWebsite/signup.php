<?php # Script 3.7 - index.php #2
$page_title = 'Infinity-Signup';
include('includes/header.html');
?>
<link href="includes/retail.css" rel="stylesheet">
<div id="wrapper">
  <main> 
<?php
// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    require_once ('./mysqli_connect.php'); // Connect to the db.
    
    $errors = array(); // Initialize an error array.
    
    // Check for a first name:
    if (empty($_POST['fname'])) {
        $errors[] = 'You forgot to enter your first name.';
    } else {
        $fn = mysqli_real_escape_string($dbc, trim($_POST['fname']));
    }
    
    // Check for a last name:
    if (empty($_POST['lname'])) {
        $errors[] = 'You forgot to enter your last name.';
    } else {
        $ln = mysqli_real_escape_string($dbc, trim($_POST['lname']));
    }
    
    // Check for an email address:
    if (empty($_POST['email'])) {
        $errors[] = 'You forgot to enter your email address.';
    } else {
        $e = mysqli_real_escape_string($dbc, trim($_POST['email']));
        if(!preg_match('/^[\w.-]+@[\w.-]+\.[A-Za-z]{2,6}$/',$e)){
            $errors[] = 'Invalid email address.';
        }
        
    }
    
    // Check for a password and match against the confirmed password:
    if (!empty($_POST['password1'])) {
        if ($_POST['password1'] != $_POST['password2']) {
            $errors[] = 'Your password did not match the confirmed password.';
        } else {
            $p = mysqli_real_escape_string($dbc, trim($_POST['password1']));
            if(!preg_match('/^\w{8,}$/',$p)){
                $errors[] = 'Your password should be at least eight characters.';
            }
        }
    } else {
        $errors[] = 'You forgot to enter your password.';
    }
    
    if (empty($errors)) { // If everything's OK.
        
        //Check if the user already registered
        $q = "SELECT customer_id FROM customers WHERE (pass=SHA2('$p',512) AND email='$e' )";
        $r = @mysqli_query($dbc, $q);
        $num = @mysqli_num_rows($r);
        if ($num < 1) { // Match was made.
            // Register the user in the database...
            
            // Make the query:
            $q = "INSERT INTO customers (first_name, last_name, email, pass) VALUES ('$fn', '$ln', '$e', SHA2('$p',512))";
            $r = @mysqli_query ($dbc, $q); // Run the query.
            if ($r) { // If it ran OK.
                // Print a message:
                echo '<tr><td style="color: #FFFFFF;"><h1>Thank you!</h1>
		      <p>You are now registered. </p><p><br /></p></td></tr>';
                
                
            } else { // If it did not run OK.
                
                // Public message:
                echo '<tr><td><h1>System Error</h1>
			   <p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>';
                
                // Debugging message:
                echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p></td></tr>';
                
            } // End of if ($r) IF.
            
            mysqli_close($dbc); // Close the database connection.
            
            // Include the footer and quit the script:
            include ('includes/footer.html');
            exit();
        }else {
            echo '<tr><td><p>This user is already in the database!<p></td></tr>';
        }
        
    } else { // Report the errors.
        
        echo '
      <tr><td><h1>Error!</h1>
		<p class="error">The following error(s) occurred:<br />';
        foreach ($errors as $msg) { // Print each error.
            echo " - $msg<br />\n";
        }
        echo '</p><p>Please try again.</p><p><br /></td></tr></p>';
        
    } // End of if (empty($errors)) IF.

    mysqli_close($dbc); // Close the database connection.
    
} // End of the main Submit conditional.
?>


<Form action="signup.php" method="post">
<table>
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
<!-- <input type="submit" value="Sign up" />-->
<input type="image" src="images/signUp.png" alt="Submit Form" width="100" height="50"dd/>
</Form>
   </main> <!-- end of main content -->
  </div>
<?php

include('includes/footer.html');
?>