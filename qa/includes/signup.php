<?php 
/* 	signup.php
 	ISYS489 Spring 2015
	Author:  Paul Gerndt

	Description:
 	Part one of the signup process.  This page takes user name,
	password, email, and date of birth and validates them.
	If initial validation passes, values are passed to step 2 of
	the signup process.

*/
//	Import functions
include("includes/validatePW.php");


echo ' Hello World!!!';


//if parseName ($_POST['fullName']);


//	Local Functions
function parseName($n) {


}

//
function validateEmail($e) {
//if emailExists($e)
// Retrieve the user_id and first_name for that email/password combination:
//	$q = "SELECT user_id, first_name FROM users WHERE email='$e' AND pass=SHA1('$p')";		
//	$r = @mysqli_query ($dbc, $q); // Run the query.
}

// Calculate age to determine if the guest is of legal age
function validateAge ($dob) {

}
echo $_POST['password'];

if (valid_pass($_POST['password'])) {
		echo 'Password is valid.';
}
	else
	{
		echo 'Sorry - invalid, try another password.';
	}


// Check if email address already exists in database
function emailExists($eMail) {
	
}

?>

<h1>Register To Use Our Services </h1>
<form action="signup.php" method="post">
	<p>Full Name (First Last): <input type="text" name="fullName" size="25" maxlength="40" value="<?php if (isset($_POST['fullName'])) echo $_POST['fullName']; ?>" /></p>
	<p>Email Address: <input type="text" name="email" size="20" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"  /> </p>
	<p>Password: <input type="password" name="password" size="10" maxlength="20" value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>"  /></p>
	<p>Birth Date: <input type="date" name="dob" size="10" maxlength="20" value="<?php if (isset($_POST['dob'])) echo $_POST['dob']; ?>"  /></p>
	<p><input type="submit" name="submit" value="Sign Up" /></p>
</form>