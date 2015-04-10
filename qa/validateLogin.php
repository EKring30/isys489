<?php
//	Import functions
include_once('./includes/validations.php'); // Master field/form validation scripts

// Credit:  http://coursesweb.net/php-mysql/

// array with error messages for each input field
$err = ARRAY (
  "password"=>"Sorry - that doesn't look like it would work here",
  "email"=>"Please enter a valid e-Mail address.",
	"userName"=>"Please enter a valid e-Mail address."
	);
	
$reout = ''; // data to return

// validate the GET value
if(isset($_REQUEST['password']) && validate_password($_REQUEST['password'])) $reout = $err['password'];
	else if(isset($_REQUEST['email']) && !validate_email($_REQUEST['email'], True)) $reout = $err['email'];
echo $reout;