<?php
	include('includes/global-vars.php');

	if (!empty($_SESSION["user"]))
	{
		$_SESSION["notice"] = "You are already logged in.";
		header('Location: index.php');
		break;
	}

	if (isset($_POST["username"]) && isset($_POST["password"]))
	{
		$_SESSION["user"] = array();
		$_SESSION["user"]["name"] = $_POST["username"];
		$_SESSION["notice"] = "Login Successful";
		header('Location: index.php');
		break;
	}

	if ((isset($_POST["username"]) && empty($_POST["password"])) || empty($_POST["username"]) && isset($_POST["password"]))
	{
		$_SESSION["error"] = "Error - you must enter both a username and a password.";
	}

	$title = "Login";
	$page = "login";
	$content = "";

	if (isset($_SESSION["notice"]))
	{
		$content .= '<div class="alert alert-success" role="alert">'.$_SESSION["notice"].'</div><br /><br />'."\r\n";
		unset($_SESSION["notice"]);
	}

	if (isset($_SESSION["error"]))
	{
		$content .= '<div class="alert alert-danger" role="alert">'.$_SESSION["error"].'</div><br /><br />'."\r\n";
		unset($_SESSION["error"]);
	}

	include('includes/login_form.php');
	include('includes/template.php');
?>