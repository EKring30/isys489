<?php
include_once 'includes/database.php';
include_once 'HumanNameParser/init.php';

// Initialize Variables
$GoodToGo = True;
if(isset($_REQUEST['fullName'])) $n = $_REQUEST['fullName']; else $GoodToGo = False;
if(isset($_REQUEST['fullName'])) $fn = parseName($n, 'F'); else $GoodToGo = False;
if(isset($_REQUEST['fullName'])) $ln = parseName($n, 'L'); else $GoodToGo = False;
if(isset($_REQUEST['email'])) $em = $_REQUEST['email']; else $GoodToGo = False;
if(isset($_REQUEST['password'])) $pw = $_REQUEST['password']; else $GoodToGo = False;
if(isset($_REQUEST['dob'])) $dob = $_REQUEST['dob']; else $GoodToGo = False;
if(isset($_REQUEST['userName'])) $un = $_REQUEST['userName']; else $GoodToGo = False;
if(isset($_REQUEST['zipCode'])) $zip = $_REQUEST['zipCode']; else $GoodToGo = False;

// Write record to the database

//create_user('humpty','dumpty','1975-03-02','49509','dumpty2@ferris.edu','dumpty2','abc123!!!');
if($GoodToGo) create_user($fn, $ln, $dob, $zip, $em, $un, $pw);

function create_user($fn, $ln, $dob, $zip, $em, $un, $pw )
{
        global $my_dbhandle;
        // prepare and bind
        $stmt = $my_dbhandle->prepare("INSERT INTO `User_Account` (`User_F_Name`, `User_L_Name`, `User_Name`, `User_Password_Current`, `User_Email`, `User_Zip`, `User_Birthdate`, `User_Locked_Out`, `User_Country_ID`, `User_Acc_Created_Date`, `Terms_Condition`, `Active`) VALUES (?, ?, ?, md5(?), ?, ?, ?, 0, 185, CURRENT_TIMESTAMP, 1, 1)");
        //$stmt = $my_dbhandle->prepare("INSERT INTO users ('firstName', 'lastName', 'userName', 'password', 'email', 'zip', 'dob') VALUES (':fn', ':ln', ':dob', ':zip', ':em', ':un', ':pw' )");
        if($stmt != false) // DB NEW SQL Object Call was Successful
		{
			// Bind Parameters
			$stmt->bind_param("sssssss", $fn, $ln, $un, $pw, $em, $zip, $dob);
			
			//Execute the statement
			$stmt->execute();

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

<html>
<form action="Login.php" method="POST" id="loginForm">
<input type="hidden" name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" />
<input type="hidden" name="password" value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>" />
</form>

<script type="text/javascript">
    function myfunc () {
        var frm = document.getElementById("loginForm");
        frm.submit();
    }
	alert('Thanks for Signing Up.  We hope you enjoy our site.');
    window.onload = myfunc;
</script>
</html>