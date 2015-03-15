<?php 
/* 	_parsename.php
 	ISYS489 Spring 2015
	Author:  Paul Gerndt

	Description:
 	Part one of the signup process.  This page takes user name,
	password, email, and date of birth and validates them.
	If initial validation passes, values are passed to step 2 of
	the signup process.

*/
//	Import functions
require('HumanNameParser/init.php');

// Declare/Initialize VARS
$n = $_GET['fullname'];
	// Local Functions
	// Parse Name
	function parseName($name) {
	 
		// 2. instantiate the parser, passing the (utf8-encoded) name you want to parse
		$parser = new HumanNameParser_Parser($name);
		 
		// 3. Use the relevant 'get' method to retrieve name parts:
		//   'leadingInit', 'first', 'nicknames', 'middle', 'last', and 'suffix'
		echo $parser->getFirst() . '<br>' . $parser->getLast();
	}
	
parseName($n);
?>
<html>
<body>
</body>
</html>