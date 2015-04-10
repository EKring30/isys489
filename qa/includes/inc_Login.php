<?php
session_start();
include_once 'includes/database.php';
global $my_dbhandle;
$res='';
$u='';
$p='';

if($my_dbhandle->connect_error)
	{
		die("Connection failed: ". $my_dbhandle->connect_error);
	}
else if(empty($_POST['email']))
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
	$stmt = $my_dbhandle->prepare("SELECT `User_name` FROM user_account where `User_Email` = ? and `User_Password_Current` = ?");
	 
    if($stmt) // DB NEW SQL Object Call was Successful
	 {
		if(isset($_POST['email'])) $u = $_POST['email'];
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
		printf("Error - Login Failed");
		
	} 		//end of if
	else	// Successful Login
	{
		$_SESSION['email'] = $_POST['email'];
		printf("Welcome %s, your login is successful.",  $res);
	}	//end of inner else
   }//end of else
?>