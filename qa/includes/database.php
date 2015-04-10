<?php
/* test */
$myHost = "localhost";
$myUser = "isys489c_gerndtp";
$myPass = "cU^8vQ=12ro0";
$myDB = "isys489c_GR_ServiceDB_Test";

/* production
$myHost = "localhost";
$myUser = "S4S_GenUser";
$myPass = "ISYS489";
$myDB = "isys489c_GR_ServiceDB";
*/

//connection to the mysql database
$my_dbhandle = new mysqli($myHost, $myUser, $myPass, $myDB);
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
else
{
	//printf('Connection OK!');
}

?>