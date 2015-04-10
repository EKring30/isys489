<?php
session_start();
include_once 'includes/database.php';
//include('includes/header.php');
global $my_dbhandle;
$res='';

if($my_dbhandle->connect_error)
	{
		die("Connection failed: ". $my_dbhandle->connect_error);
	}
else if(empty($_POST['username']))
    {
       echo "Error- Please enter Email.";
	}
     
else if(empty($_POST['password']))
    {
        echo "Error- Please enter Password.";
    }
	
else
   {
	   
	 //look up username and password in db
	$stmt = $my_dbhandle->prepare("SELECT `User_Name` FROM `User_Account` WHERE `User_Email` = ? AND `User_Password_Current` = ?");
	 
    if($stmt != false) // DB NEW SQL Object Call was Successful

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