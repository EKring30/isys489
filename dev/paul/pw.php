<?php
	// Start the session
	session_start();
	include('includes/global-vars.php');
	include('includes/validatePW.php');
	$title = "Index";
	$page = "index";
	$content = "";
	
		if (isset($_SESSION["notice"]))
	{
		$content .= '<div class="alert alert-success" role="alert">'.$_SESSION["notice"].'</div><br /><br />'."\r\n";
		unset($_SESSION["notice"]);
	}

	$md5hash = "";
	$sha1hash = "";

	if (!empty($_POST['pw']))
	{
		if (valid_pass($_POST['pw']))
		{
			echo 'Nice Password!';
		}
		else
		{
			echo $_POST['pw'] . ' is not a secure Password.';
		}
		$md5hash = md5($_POST['pw']);
		$sha1hash = sha1($_POST['pw']);
	}

	if (!empty($md5hash))
	{
		$content .= "MD5 hash: " . $md5hash . " - string is: " . strlen($md5hash) . " characters long.<br />\r\n";
	}
	if (!empty($sha1hash))
	{
		$content .= "SHA1 hash: " . $sha1hash . " - string is: " . strlen($sha1hash) . " characters long.<br />\r\n";
	}

	$content .= '<br />
		<b>Enter a string to be hashed:<br />
		<form method="post" action="pw.php">
		<input type="password" name="pw" id="pw" />
		<input type="submit" value="Hash It" />
		</form>'."\r\n";

	include('includes/template.php');

?>