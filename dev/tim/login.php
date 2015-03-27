<?php
	session_start();
	include('includes/database.php');
	global $my_dbhandle;
	$rtrn = array();

	// Check connection
	if ($my_dbhandle->connect_error) {
	    die("Connection failed: " . $my_dbhandle->connect_error);
	}

	if (empty($_POST))
	{
		$rtrn["msg"] = "Error - username or password invalid.";
		echo json_encode($rtrn);
	}
	else
	{
		if (!empty($_POST['username']) && !empty($_POST['pwd']))
		{
			$referer = $_SERVER['HTTP_REFERER'];
			$fingerprint = md5('KrC6fV8Y5xNG5:R'.$_SERVER['HTTP_USER_AGENT']);

			$stmt = $my_dbhandle->prepare("SELECT id FROM users WHERE username = ? AND password = ?");
			if (!$stmt)
			{
				$rtrn["msg"] = "Database error - please contact your system administrator.";
				echo json_encode($rtrn);
			}
			else
			{
				$stmt->bind_param("ss", $_POST['username'], md5($_POST['pwd']));
				if (!$stmt->execute()) {
				    echo "There was an error logging in. Please contact the system administrator.";
				}
				$stmt->bind_result($id);

				$stmt->fetch();
				if (!empty($id))
				{
					if (!empty($referer) && strpos($referer, "logout") === FALSE)
					{
						$rtrn["url"] = $referer;
					}
					else
					{
						$rtrn["url"] = "index.php";
					}

					unset($_GET);
					$_SESSION['last_active'] = time();
					$_SESSION['fingerprint'] = $fingerprint;
					$_SESSION['username'] = $_POST['username'];
					$rtrn["msg"] = "success";
					echo json_encode($rtrn);
				}
				else
				{
			    	$rtrn["msg"] = "Error - invalid username or password.";
			    	echo json_encode($rtrn);
			    }
			}
		}
		else
		{
			$rtrn["msg"] = "Error - username or password invalid.";
			echo json_encode($rtrn);
		}
	}
?>