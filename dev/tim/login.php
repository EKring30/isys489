<?php
	session_start();
	include('includes/database.php');
	global $my_dbhandle;

	// Check connection
	if ($my_dbhandle->connect_error) {
	    die("Connection failed: " . $my_dbhandle->connect_error);
	}

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
			// prepare and bind
			$stmt = $my_dbhandle->prepare("SELECT id FROM users WHERE username = ? AND password = ?");
			$stmt->bind_param("ss", $_POST['username'], md5($_POST['pwd']));
			if (!$stmt->execute()) {
			    echo "There was an error logging in. Please contact the system administrator.";
			}
			$res = $stmt->get_result();
			if (!$res) 
			{
			    echo "Error - invalid username or password.";
			}
			else
			{
				$_SESSION['username'] = $_POST['username'];
				echo "success";
			}
		}
		else
			echo "Error - username or password invalid.";
	}
?>