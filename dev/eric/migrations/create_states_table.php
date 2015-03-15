<?php
include('../includes/database.php');
global $my_dbhandle;

$create_states_sql = "CREATE TABLE IF NOT EXISTS states (
	id INT NOT NULL auto_increment, 
	name CHAR(40) NOT NULL, 
	abbrev CHAR(2) NOT NULL, 
	PRIMARY KEY (id) );";

if ($my_dbhandle->query($create_states_sql) === TRUE) {
    printf("States table successfully created.\n");
	echo "<br />\r\n";
}
else
{
	printf("Error message: %s\n", $my_dbhandle->error);
	echo "<br />\r\n";
}

$insert_states_query = "INSERT INTO states (name, abbrev) VALUES ('Alaska', 'AK'),
('Alabama', 'AL'),
('American Samoa', 'AS'),
('Arizona', 'AZ'),
('Arkansas', 'AR'),
('California', 'CA'),
('Colorado', 'CO'),
('Connecticut', 'CT'),
('Delaware', 'DE'),
('District of Columbia', 'DC'),
('Federated States of Micronesia', 'FM'),
('Florida', 'FL'),
('Georgia', 'GA'),
('Guam', 'GU'),
('Hawaii', 'HI'),
('Idaho', 'ID'),
('Illinois', 'IL'),
('Indiana', 'IN'),
('Iowa', 'IA'),
('Kansas', 'KS'),
('Kentucky', 'KY'),
('Louisiana', 'LA'),
('Maine', 'ME'),
('Marshall Islands', 'MH'),
('Maryland', 'MD'),
('Massachusetts', 'MA'),
('Michigan', 'MI'),
('Minnesota', 'MN'),
('Mississippi', 'MS'),
('Missouri', 'MO'),
('Montana', 'MT'),
('Nebraska', 'NE'),
('Nevada', 'NV'),
('New Hampshire', 'NH'),
('New Jersey', 'NJ'),
('New Mexico', 'NM'),
('New York', 'NY'),
('North Carolina', 'NC'),
('North Dakota', 'ND'),
('Northern Mariana Islands', 'MP'),
('Ohio', 'OH'),
('Oklahoma', 'OK'),
('Oregon', 'OR'),
('Palau', 'PW'),
('Pennsylvania', 'PA'),
('Puerto Rico', 'PR'),
('Rhode Island', 'RI'),
('South Carolina', 'SC'),
('South Dakota', 'SD'),
('Tennessee', 'TN'),
('Texas', 'TX'),
('Utah', 'UT'),
('Vermont', 'VT'),
('Virgin Islands', 'VI'),
('Virginia', 'VA'),
('Washington', 'WA'),
('West Virginia', 'WV'),
('Wisconsin', 'WI'),
('Wyoming', 'WY'),
('Armed Forces Africa', 'AE'),
('Armed Forces Americas (except Canada)', 'AA'),
('Armed Forces Canada', 'AE'),
('Armed Forces Europe', 'AE'),
('Armed Forces Middle East', 'AE'),
('Armed Forces Pacific', 'AP');";

if ($my_dbhandle->query($insert_states_query) === TRUE) {
    printf("State data successfully inserted.\n");
	echo "<br />\r\n";
}
else
{
	printf("Error message: %s\n", $my_dbhandle->error);
	echo "<br />\r\n";
}

$my_dbhandle->close();

?>