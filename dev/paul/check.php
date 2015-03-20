<?php
//	Import functions
include_once('./includes/validations.php'); // Master field/form validation scripts
include_once('./HumanNameParser/init.php');

// Credit:  http://coursesweb.net/php-mysql/

// array with error messages for each input field
$err = ARRAY (
  "fullName"=>"Only first and last name are required.",
  "password"=>"Sorry - Password does not meet requirements.",
  "dob"=>"Sorry - You must be 18 years or older to use our site.",
  "email"=>"Sorry - This email address appears invalid."
	);
	
$reout = ''; // data to return

// validate the GET value
if(isset($_REQUEST['fullName']) && !preg_match('/(?:[A-Za-z]+(?:\s+|$)){2,4}/', $_REQUEST['fullName'])) $reout = $err['fullName'];
else if(isset($_REQUEST['password']) && validate_password($_REQUEST['password'])) $reout = $err['password'];
else if(isset($_REQUEST['dob']) && validate_dob($_REQUEST['dob'])) $reout = $err['dob'];
else if(isset($_REQUEST['email']) && !validate_email($_REQUEST['email'])) $reout = $err['email'];
echo $reout;