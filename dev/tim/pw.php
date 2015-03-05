<?php
	// Start the session
	session_start();
	include('includes/global-vars.php');
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

	if (!empty($_POST['pwhash']))
	{
		if (array_key_exists('pw', $_POST['pwhash']))
		{
			$pw = $_POST['pwhash']['pw'];
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
		<form method="post" action="pw.php" name="pwhash">
		<input type="password" name="pwhash[pw]" id="pw" />
		<input type="submit" value="Hash It" />
		</form>'."\r\n";

	include('includes/template.php');
?>