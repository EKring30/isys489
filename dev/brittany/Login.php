<?php
session_start();
<<<<<<< HEAD
include('includes/database.php');
//include('includes/header.php');
=======
include('includes/mysqli_connect.php');
>>>>>>> origin/master
global $my_dbhandle;
global $dbc;

if($dbc->connect_error)
	{
		die("Connection failed: ". $dbc->connect_error);
	}
elseif(empty($_POST['username']))
    {
       echo "Error- Please enter Email.";
	}
     
elseif(empty($_POST['password']))
    {
        echo "Error- Please enter Password.";
    }
	
else
<<<<<<< HEAD
   {
	   
	 //look up username and password in db
	 if($stmt = $my_dbhandle->prepare("SELECT userName FROM users WHERE email = ? AND password = ?")) 
	 {
		
		if(isset($_POST['username'])) $u = $_POST['username'];
		if(isset($_POST['password'])) $p = md5($_POST['password']);
		
		$stmt->bind_param("ss", $u, $p);
		$stmt->execute();
		
		/* bind result variables */
		$stmt->bind_result($res);

		/* fetch value */
		$stmt->fetch();
	 }
	if (!$res)	// Select was executed - no value returned
	{
		echo "Error- invalid username or password.";
		
	} 		//end of if
	else	// Successful Login
	{
		$_SESSION['username'] = $_POST['username'];
		printf("Welcome %s, your login is successful",  $res);
	}	//end of inner else
   }//end of else
?>
=======
{ 
	$stmt = $conn->prepare("SELECT dUsername, dPassword FROM users WHERE username = ? AND password = ?");
	 $stmt -> bind_param("ss", $_POST['username'], md5($_POST['password']);
	 $res = $stmt->get_result();
	 if (!$res)
	 {
		 echo "Error- invalid username or password.";
	 }//end of if
	 else
	 {
		 $_SESSION['username'] = $_POST['username'];
		 echo "success";
	 }
}
?>
 
>>>>>>> origin/master
