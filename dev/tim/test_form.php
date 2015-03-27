<?php
	session_start();
	include('includes/global-vars.php');
	include('includes/validations.php');

	$title = "Form to Test Validations";
	$page = "test";

	if (isset($_SESSION["notice"]))
	{
		$content .= '<div class="alert alert-success" role="alert">'.$_SESSION["notice"].'</div><br /><br />'."\r\n";
		unset($_SESSION["notice"]);
	}

	$md5hash = "";
	$sha1hash = "";

	if (!empty($_POST))
	{
		$formIsValid = validateForm();

		if (is_array($formIsValid))
		{
			echo '<br /><div class="row"><div class="col-md-6 col-md-offset-3 bg-danger">';
			foreach ($formIsValid as $k => $v)
			{
				echo $v . "<br />\r\n";
			}
			echo '</div></div>';
		}
		else
			echo "Form is valid.<br />\r\n";
	}

	if (!empty($_POST['pwd']))
	{
		$pw = $_POST['pwd'];
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