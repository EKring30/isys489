<?php
 	session_start();

function session_is_valid()
{
	$timeout = 3 * 60; // 3 minutes
	$fingerprint = md5('KrC6fV8Y5xNG5:R'.$_SERVER['HTTP_USER_AGENT']);
	if ( empty($_SESSION['last_active'])
		 || (isset($_SESSION['last_active']) && (time() > ($_SESSION['last_active']+$timeout)))
	     || (isset($_SESSION['fingerprint']) && $_SESSION['fingerprint']!=$fingerprint)
	     || isset($_GET['logout']) ) 
	{
	    return false;
	}
	else
	{
		session_regenerate_id(); 
		$_SESSION['last_active'] = time();
		$_SESSION['fingerprint'] = $fingerprint;
		return true;
	}
}

function do_logout()
{
	if (isset($_SESSION))
	{
		$notice = "";
		if (!empty($_SESSION['notice']))
		{
			$notice = $_SESSION['notice'];
		}

		session_unset();
		session_destroy();
		session_write_close();
		setcookie(session_name(),'',0,'/');
		session_regenerate_id(true);

		if (!empty($notice))
		{
			$_SESSION['notice'] = $notice;
		}
	}
}

?>