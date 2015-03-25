<?php
	session_start();
	if (empty($_POST))
	{
		header('Location: index.php');
	}
	else
	{
		if (!empty($_POST['username']) && !empty($_POST['pwd']))
		{
			$_SESSION['user'] = $_POST['username'];
			header('Location: index.php');
		}
		else
			echo "Error - username or password invalid.";
	}
?>