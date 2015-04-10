<?php
//	Import functions
include_once('includes/validations.php'); // Master field/form validation scripts

// Credit:  http://coursesweb.net/php-mysql/

// array with error messages for each input field
$err = ARRAY (
  "jobtitle"=>"Please enter a valid Title for your service.",
  "jobDesc"=>"Sorry - Please provide a valid service description.",
  "jobCat"=>"Sorry - Please choose a category from the list provided.",
  "jobCost"=>"Sorry - Price is mandatory and must be greater than 0."
	);
	
$reout = ''; // data to return

// validate the GET value
if(isset($_REQUEST['jobtitle']) && !validate_job_title($_REQUEST['jobtitle'])) $reout = $err['jobtitle'];
else if(isset($_REQUEST['jobDesc']) && !validate_description($_REQUEST['jobDesc'])) $reout = $err['jobDesc'];
else if(isset($_REQUEST['jobCat']) && !validate_category($_REQUEST['jobCat'])) $reout = $err['jobCat'];
else if(isset($_REQUEST['jobCost']) && !validate_price($_REQUEST['jobCost'])) $reout = $err['jobCost'];
echo $reout;