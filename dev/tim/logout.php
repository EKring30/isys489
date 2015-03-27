 <?php
 	session_start();
	include('includes/global-vars.php');
	include('includes/session_validation.php');
	
	if (!session_is_valid())
	{
		do_logout();
	}
	
	$title = "Logout";
	$page = "logout";

	if (isset($_SESSION["notice"]))
	{
		$content .= '<div class="row"><div class="col-xs-12"><h1>'.$_SESSION["notice"].'</h1></div></div>'."\r\n";
		// if (strpos($_SESSION['notice'], "sign in") !== FALSE)
		// {
		// 	include('includes/login_form.php');
		// }
		unset($_SESSION["notice"]);
	}
	else
		$content .= "<h1>You have successfully been logged out.</h1>\r\n";

	include('includes/template.php');
 ?>
