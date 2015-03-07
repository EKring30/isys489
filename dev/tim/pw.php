<?php
	// Start the session
	session_start();
	include('includes/global-vars.php');
	include('includes/validations.php');
	$title = "Hash Password";
	$page = "pw";
	$content = "";

	if (isset($_SESSION["notice"]))
	{
		$content .= '<div class="alert alert-success" role="alert">'.$_SESSION["notice"].'</div><br /><br />'."\r\n";
		unset($_SESSION["notice"]);
	}

	$md5hash = "";
	$sha1hash = "";

	if (!empty($_POST))
	{
		if (!empty($_POST['username']))
		{
			$userValid = validate_username($_POST['username']);
			if ($userValid)
				echo "<br />\r\nUsername is valid.<br />\r\n";
			else
				echo "<br />\r\nUsername is invalid.<br />\r\n";
		}
		if (empty($_POST['terms']))
			echo "\r\n<br />\r\nError - you MUST agree to the terms.<br />\r\n";

		if (!empty($_POST['dob']))
		{
			$today = strtotime(date('Y-m-d H:i:s'));
		    $birthday = strtotime($_POST['dob']);
		    $age = ($today - $birthday) / (60*60*24*365);
		    echo "<br />\r\nAge is " . $age . " years old.<br />\r\n";
		    if ($age > 18)
		    	echo "Person is older than 18.<br />\r\n";
		    elseif ($age < 18)
		    	echo "Person is younger than 18.<br />\r\n";
		}
	}

	if (!empty($_POST['pw']))
	{
		$pw = $_POST['pw'];
		if (empty($pw))
		{
			$content .= "Error - no value was entered. Please enter a value to hash.<br />\r\n";
		}
		else
		{
			$md5hash = md5($pw);
			$sha1hash = sha1($pw);
		}
	}

	if (!empty($md5hash))
	{
		$content .= "MD5 hash: " . $md5hash . " - string is: " . strlen($md5hash) . " characters long.<br />\r\n";
	}
	if (!empty($sha1hash))
	{
		$content .= "SHA1 hash: " . $sha1hash . " - string is: " . strlen($sha1hash) . " characters long.<br />\r\n";
	}

	include('includes/form.php');

	include('includes/template.php');
?>