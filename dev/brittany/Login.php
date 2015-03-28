<?php
session_start();
include('includes/mysqli_connect.php');
include('includes/header.php');
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
{ 
	$stmt = $conn->prepare("SELECT dUsername, dPassword FROM users WHERE username = ? AND password = ?");
	 $stmt -> bind_param("ss", $_POST['username'], "ss",$_POST['password']);
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
 