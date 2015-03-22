<html>

<style type="text/css">
/* style for validated field */
.vinp {
 background: #efeffe;
 border: 1px solid blue;
}

/* style for invalidated field */
.errinp {
 background: #fefbda;
 border: 2px dashed red;
}

/* style for error message */
.err {
 margin: 0 5px;
 color: red;
 font-style: italic;
}
</style>
<head>
<?php
	// Start the session
	//session_start();
	include('includes/global-vars.php');
	$title = "Index";
	$page = "index";
	$content = "";

	if (isset($_SESSION["notice"]))
	{
		$content .= '<div class="alert alert-success" role="alert">'.$_SESSION["notice"].'</div><br /><br />'."\r\n";
		unset($_SESSION["notice"]);
	}
include('includes/template.php');
?>
	
</head>
<body>

<h1>Register To Use Our Services </h1>
<form action="" method="POST" onsubmit="return formIsReady(this);">
	<p>Full Name (First Last): <input type="text" name="fullName" id="fullName" size="25" maxlength="40" 
			value="<?php include_once('HumanNameParser/init.php');
							$n = $_POST['fullName'];
							parseName($n, 'FN'); // Get First and Last Name
							?>" /><span class="err"></span></label><br/>
	<p>Email Address: <input type="text" name="email" id="email" size="20" maxlength="60" 
			value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"  /><span class="err"></span></label><br/>
	<p>Password: <input type="password" name="password" id="password" size="10" maxlength="20" 
			value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>"  /> 
				<a title="Password length must be 8 or more characters, and include 3 of the following elements: UPPER CASE LETTER, lower case letter, number, special characters (!@#$%, etc.)"><img src="./images/question.png" alt="" style="width:25px;height:25px"></a>
				<span class="err"></span></label><br/>
	<p>Birth Date: <input type="date" name="dob" id="dob" size="10" maxlength="20" 
			value="<?php if (isset($_POST['dob'])) echo $_POST['dob']; ?>"  /><span class="err"></span></label><br/>
	<p>User Name (Handle): <input type="text" name="userName" id="userName" size="20" maxlength="25"/><span class="err"></span></label><br/>
	Your User Name will be visible on your profile and postings (i.e., <i>GrassCutter</i>).
	<p>ZIP Code: <input type="text" name="zipCode" id="zipCode" size="5" maxlength="10"/><span class="err"></span></label><br/>
	We use ZIP codes to show you services nearby.
	<p>By signing up, you agree to our <a href="TermsConditions.html" target="_blank" " title="Terms and Conditions</u>" <u> Terms and Conditions. </u> </a>
	<p><input type="submit" class="exsbm" name="submit" id="btnSubmit" value="Sign Up" disabled="true"/></p>

</form>

<script type="text/javascript">

// object to validate form fields when they lose focus, via Ajax
var checkFormElm = function() {
  // from: http://coursesweb.net/ajax/
  var phpcheck = 'check_final.php'; // Here add the php file that validate the form element
  var err = {}; // stores form elements name, with value of 1 for invalid, and value 0 for valid

  // change the css class of elm
  var setelm = function(elm, val) {
    // if val not empty, sets in err an item with element name, and value of 1
    // sets border to this form element,
    // else, sets in err an item with element name, and value of 0, and removes the border
    if(val != '') {
      err[elm.name] = 1;
      elm.className = 'errinp';
      if(elm.form.querySelector('.exsbm')) elm.form.querySelector('.exsbm').setAttribute('disabled', 'disabled');      // disables the submit
      elm.parentNode.querySelector('.err').innerHTML = val;     //  adds the error message
    }
    else {
      err[elm.name] = 0;
      elm.className = 'vinp';
      elm.parentNode.querySelector('.err').innerHTML = '';     //  removes the error message

      // check if invalid items in $err (with value 1)
      var inv = 0;
      for (var key in err) {
        if(err[key] == 1) {
          inv = 1;
          break;
        }
      }
			
      // if not invalid element, enables the submit button
      if(inv == 0 && elm.form.querySelector('.exsbm')) elm.form.querySelector('.exsbm').removeAttribute('disabled');
			
    }
  }

  // sends data to a php file, via POST, and displays the received answer
  this.checkAjax = function(elm) {
    if(elm.value != '') {
      var xmlHttp =  (window.ActiveXObject) ? new ActiveXObject("Microsoft.XMLHTTP") : new XMLHttpRequest();    // gets the XMLHttpRequest instance

      // create pairs index=value with data that must be sent to server
      var  datatosend = elm.name +'='+ elm.value;

      xmlHttp.open("POST", phpcheck, true);      // set the request to php file

      // adds  a header to tell the PHP script to recognize the data as is sent via POST
      xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xmlHttp.send(datatosend);     // calls the send() method with data as parameter

      // Check request status
      xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4) setelm(elm, xmlHttp.responseText);
      }
    }
    else setelm(elm, 'This field must be completed.');
  }
}

var chkF = new checkFormElm(); // object instance of checkFormElm()

// HERE register onblur event to form elements that must be validated with PHP via Ajax
document.getElementById('fullName').onblur = function() { chkF.checkAjax(this);}
document.getElementById('email').onblur = function() { chkF.checkAjax(this);}
document.getElementById('password').onblur = function() { chkF.checkAjax(this);}
document.getElementById('dob').onblur = function() { chkF.checkAjax(this);}
document.getElementById('zipCode').onblur = function() { chkF.checkAjax(this);}
document.getElementById('userName').onblur = function() { chkF.checkAjax(this);}
</script>
<br/>
</body>

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
include_once('includes/validations.php'); // Master field/form validation scripts

$n = $_POST['fullName'];

// Declare/Initialize VARS
$fn = parseName($n, 'F');
$ln = parseName($n, 'L');
$em = $_POST['email'];
$pw = $_POST['password'];
$dob = $_POST['dob'];
$un = $_POST['userName'];
$zip = $_POST['zipCode'];


//	Local Functions
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

// Perform Validations
// Parse Name
//
echo $fn . '<br>';
echo $ln . '<br>';
echo $em. '<br>';
echo $pw . '<br>';
echo $dob . '<br>';
echo $un . '<br>';
echo $zip . '<br>';

?>

</html>