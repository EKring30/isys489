<?php
	session_start();
	include('includes/database.php');
	global $my_dbhandle;
	
	if (empty($_POST))
	{
		echo "Error - username or password invalid.";
	}
	else
	{
		if (!empty($_POST['username']) && !empty($_POST['pwd']))
		{
			// Add code here to look up username and password in the database.
			// If username & password combo match, add session variables and proceed.
			// Else, echo error message.
			$_SESSION['username'] = $_POST['username'];
			echo "success";
		}
		else
			echo "Error - username or password invalid.";
	}
?>