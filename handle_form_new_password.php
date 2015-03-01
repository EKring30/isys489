<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
	<title>Update Password</title>
	<link rel="stylesheet" type="text/css" media="screen" href="productStyle.css" />
	</style>
</head>
<body>
<?php # Script 1.0 - handle_form_new_password.php

// Validate the Current Password:
if (!empty($_POST['currentPassword'])) 
	{
	$currentPassword = $_POST['currentPassword'];
	} 
else
	{
	$currentPassword = NULL;
	echo '<p class="error">You forgot to enter your current password!</p>';
	}
			
// Validate the New Password:
if (!empty($_POST['newPassword'])) 
	{
	$newPassword = $_POST['newPassword'];
	} 
else
	{
	$newPassword = NULL;
	echo '<p class="error">You forgot to enter your New Password!</p>';
	}

// Validate the Confirm New Password:
if (!empty($_POST['confirmNewPassword'])) 
	{
	$confirmNewPassword = $_POST['confirmNewPassword'];
	} 
else
	{
	$confirmNewPassword = NULL;
	echo '<p class="error">You forgot to enter your Confirm New Password!</p>';
	}

// if everything is OK, process the order and print the confirmation:
if ($currentPassword && $newPassword && $confirmNewPassword )
	{
	
	echo '<script language="javascript">';
	echo 'alert("Your password has been successfully changed")';
	echo '</script>';
	
	// here is where the order goes	
	echo "<h1>Thank You!</h1>
	<p>Your password has been successfully changed.<br/>";	
	}
	
// missing form value	
else  
	{
	echo '<script language="javascript">';
	echo 'alert("You missed something. Please go back and fill out the form again.")';
	echo '</script>';
	}
?>
<p><b>Click here to</b> <a href="changes_password.html">Return to change your password</a>.  </p>

</body>
</html>