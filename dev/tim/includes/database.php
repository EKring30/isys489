<?php
$myHost = "localhost";
$myUser = "root";
$myPass = "";
$myDB = "isys489";

//connection to the mysql database
$my_dbhandle = new mysqli($myHost, $myUser, $myPass, $myDB);
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
?>
