<?php
include('../includes/database.php');
global $my_dbhandle;

$create_users_sql = "CREATE TABLE `users` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `address1` varchar(100) DEFAULT NULL,
  `address2` varchar(25) DEFAULT NULL,
  `city` varchar(125) DEFAULT NULL,
  `state_id` int(7) DEFAULT NULL,
  `zip` varchar(11) DEFAULT NULL,
  `country_id` int(7) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `phone_type` varchar(15) DEFAULT NULL,
  `dob` datetime DEFAULT NULL,
  `username` varchar(150) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `travel_radius` int(7) DEFAULT NULL,
  `terms` tinyint(1) DEFAULT NULL,
  `pref_contact_method` varchar(10) DEFAULT NULL,
  `nickname` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
)";

if ($my_dbhandle->query($create_users_sql) === TRUE) {
    printf("Users table successfully created.\n");
  echo "<br />\r\n";
}
else
{
  printf("Error message: %s\n", $my_dbhandle->error);
  echo "<br />\r\n";
}
?>