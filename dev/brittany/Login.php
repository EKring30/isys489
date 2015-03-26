
<!DOCTYPE html>
<html>
<body>
<?php
session_start();
include('includes/database.php');
include('includes/header.php');
global $my_dbhandle;

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
	 $stmt = $conn->prepare("SELECT dUsername, dPassword FROM users WHERE username = dUsername AND password = dPassword");
	 $stmt -> bind_param("ss", $_POST['username'], md5($_POST['password']));
	 $res = $stmt->get_result();
	 if (!$res)
	 {
		 echo "Error- invalid username or password.";
	 }//end of if
	 else
	 {
	 $_SESSION['username'] = $_POST['username'];
	 echo "success";
	 }//end of inner else
   }//end of else
    

?>
</body>
</html>