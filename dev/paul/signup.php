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

$d = $_POST['dob'];
$n = $_POST['fullName'];
$e = $_POST['email'];


//	Local Functions
	// Parse Name
	function parseName($name) {
	 
	// 2. instantiate the parser, passing the (utf8-encoded) name you want to parse
	$parser = new HumanNameParser_Parser($_POST['fullName']);
	 
	// 3. Use the relevant 'get' method to retrieve name parts:
	//   'leadingInit', 'first', 'nicknames', 'middle', 'last', and 'suffix'
	echo $parser->getFirst() . '  ' . $parser->getLast();
	 

}

//
function validateEmail($eMail) {
// Function returns a boolean.  
// True = No matching email address is found in the database, selected email IS OK.
// False = Matching email address was found in the database, selected email is NOT ok.
$q = "SELECT Email FROM User_Account WHERE Email = '" . $eMail . "'";		
echo $q;

//Database connection required - Remove hashmarks to enable section below
//	$r = @mysqli_query ($dbc, $q); // Run the query.
/*if ($mysqli_affected_rows($r) > 0) {
	return false;
} else {
	return true;
}
*/
}

// Calculate age to determine if the guest is of legal age
function validateAge ($dob) {
$date1 = date($dob);
$date2 = $date = date('Y-m-d');

$years =  date_diff(date_create($date1), date_create('today'))->y;

if ($years > 17) {
	Echo 'OK Bucko ' . number_format($years,0) . ' years';
	return true;
	} else {
		echo "Sorry, you must be 18 years or older to use this site. You are " . number_format($years,0);
		return false;
	}
}

//Validate Password
if (valid_pass($_POST['password'])) {
		// Insert code to next step
		//echo 'Password is valid.';
	}	else {
		echo 'Sorry - invalid, try another password.';
	}


// Perform Validations
// Parse Name
parseName($n);
validateEmail($e);
validateAge($d);
?>


<head>
</head>
<h1>Register To Use Our Services </h1>
<form action="signup.php" method="post">
	<p>Full Name (First Last): <input type="text" name="fullName" size="25" maxlength="40" value="<?php if (isset($_POST['fullName'])) echo $_POST['fullName']; ?>" /></p>
	<p>Email Address: <input type="text" name="email" size="20" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"  /> </p>
	<p>Password: <input type="password" name="password" size="10" maxlength="20" value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>"  /></p>
	<p>Birth Date: <input type="date" name="dob" size="10" maxlength="20" value="<?php if (isset($_POST['dob'])) echo $_POST['dob']; ?>"  /></p>
	<p><input type="submit" name="submit" value="Sign Up" /></p>
</form>