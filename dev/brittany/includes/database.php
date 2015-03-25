<?php
/* local */
// $myHost = "localhost";
// $myUser = "Brittany";
// $myPass = "isys489pass";
// $myDB = "isys489";

/* prod */
$myHost = "localhost";
$myUser = "Brittany";
$myPass = "Bbstrya180";
$myDB = "isys489";

//connection to the mysql database
$my_dbhandle = new mysqli($myHost, $myUser, $myPass, $myDB);
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
?>
