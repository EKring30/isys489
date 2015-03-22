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
include_once('includes/validatePW.php');
include_once('HumanNameParser/init.php');

$n = $_POST['fullName'];


//	Local Functions
	// Parse Name
	function parseName($name) {
	 
	// 2. instantiate the parser, passing the (utf8-encoded) name you want to parse
	$parser = new HumanNameParser_Parser($_POST['fullName']);
	 
	// 3. Use the relevant 'get' method to retrieve name parts:
	//   'leadingInit', 'first', 'nicknames', 'middle', 'last', and 'suffix'
	echo $parser-&gt;getFirst() . '  ' . $parser-&gt;getLast(); // returns 'John de la Rúa'
	echo getFirst() . '  ' . getLast(); // returns 'John de la Rúa' 
	
	 
	// 4. Use the setter method for new names
	//$parser-&gt;setName($name);

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

//Validate Password
if (valid_pass($_POST['password'])) {
		// Insert code to next step
		//echo 'Password is valid.';
}
	else
	{
		
		echo 'Sorry - invalid, try another password.';
	}

	
// Parse Name
parseName($n);



// Check if email address already exists in database
function emailExists($eMail) {
	
}

?>
<head>
Hello World
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head>
<h1>Register To Use Our Services </h1>
<form action="signup.php" method="post">
	<p>Full Name (First Last): <input type="text" name="fullName" size="25" maxlength="40" value="<?php if (isset($_POST['fullName'])) echo $_POST['fullName']; ?>" /></p>
	<p>Email Address: <input type="text" name="email" size="20" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"  /> </p>
	<p>Password: <input type="password" name="password" size="10" maxlength="20" value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>"  /></p>
	<p>Birth Date: <input type="date" name="dob" size="10" maxlength="20" value="<?php if (isset($_POST['dob'])) echo $_POST['dob']; ?>"  /></p>
	<p><input type="submit" name="submit" value="Sign Up" /></p>
</form>