<?php
/* local */
// $myHost = "localhost";
// $myUser = "isys489user";
// $myPass = "isys489pass";
// $myDB = "isys489";

/* prod */
$myHost = "localhost";
$myUser = "isys489c_hansent";
$myPass = "Z(ZQbTW-gvoV";
$myDB = "isys489c_GR_ServiceDB";

//connection to the mysql database
$my_dbhandle = new mysqli($myHost, $myUser, $myPass, $myDB);
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
?>
