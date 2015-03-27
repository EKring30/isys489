<?php
include_once '/includes/database.php';
include_once '/HumanNameParser/init.php';

// Initialize Variables
if(isset($_REQUEST['fullName'])) $n = $_REQUEST['fullName'];
if(isset($_REQUEST['fullName'])) $fn = parseName($n, 'F');
if(isset($_REQUEST['zipCode'])) $ln = parseName($n, 'L');
if(isset($_REQUEST['email'])) $em = $_REQUEST['email'];
if(isset($_REQUEST['password'])) $pw = $_REQUEST['password'];
if(isset($_REQUEST['dob'])) $dob = $_REQUEST['dob'];
if(isset($_REQUEST['userName'])) $un = $_REQUEST['userName'];
if(isset($_REQUEST['zipCode'])) $zip = $_REQUEST['zipCode'];

// Write record to the database

//create_user('humpty','dumpty','1975-03-02','49509','dumpty2@ferris.edu','dumpty2','abc123!!!');
create_user($fn, $ln, $dob, $zip, $em, $un, $pw);


function create_user($fn, $ln, $dob, $zip, $em, $un, $pw )
{
        global $my_dbhandle;
        // prepare and bind
        $stmt = $my_dbhandle->prepare("INSERT INTO `users` (`firstName`, `lastName`, `userName`, `password`, `email`, `zip`, `dob`) VALUES (?, ?, ?, md5(?), ?, ?, ?)");
        //$stmt = $my_dbhandle->prepare("INSERT INTO users ('firstName', 'lastName', 'userName', 'password', 'email', 'zip', 'dob') VALUES (':fn', ':ln', ':dob', ':zip', ':em', ':un', ':pw' )");
        if($stmt != false) // DB NEW SQL Object Call was Successful
		{
			// Bind Parameters
			$stmt->bind_param("sssssss", $fn, $ln, $un, $pw, $em, $zip, $dob);
			
			//Execute the statement
			$stmt->execute();
			printf("%d Row inserted.\n", $stmt->affected_rows);

			// Close the connection
			$stmt->close();
		}
		Else
		{
			die('prepare() failed: ' . htmlspecialchars($my_dbhandle->error));
			printf('Sorry - Database call failed!!  Try again later');
		}
}

	// Parse Name
	function parseName($name, $part) {  // Parts 'F' = First, 'L' = Last, 'FN' = Full Name
	$value = ''; 
	// 2. instantiate the parser, passing the (utf8-encoded) name you want to parse
	$parser = new HumanNameParser_Parser($name);
	 
	// 3. Use the relevant 'get' method to retrieve name parts:
	//   'leadingInit', 'first', 'nicknames', 'middle', 'last', and 'suffix'
	//echo $parser->getFirst() . ' ' . $parser->getLast();
	$fn = $parser->getFirst();
	$ln = $parser->getLast();
	
	if($part == 'F') {
		$value = $fn;
		return $value;
	}
	else if($part == 'L') {
		$value = $ln;
		return $value;
	}
	else {
		$value = $fn . ' ' . $ln;
		echo $value;
	}
	}
?>