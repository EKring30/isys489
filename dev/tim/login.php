<?php
	session_start();
	if (empty($_POST))
	{
		echo "Error - username or password invalid.";
	}
	else
	{
		if (!empty($_POST['username']) && !empty($_POST['pwd']))
		{
			$_SESSION['user'] = $_POST['username'];
			echo "success";
		}
		else
			echo "Error - username or password invalid.";
	}
?>