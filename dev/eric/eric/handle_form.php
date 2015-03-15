<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
	<title>Order Confirmation - Thank You</title>
	<link rel="stylesheet" type="text/css" media="screen" href="productStyle.css" />
	</style>
</head>
<body>
<?php # Script 1.0 - handle_form.php

// Validate the job title:
if (!empty($_POST['jobtitle'])) 
	{
	$jobTitle = $_POST['jobtitle'];
	} 
else
	{
	$jobTitle = NULL;
	echo '<p class="error">You forgot to enter a Job Title!</p>';
	}
			
// Validate the Description:
if (!empty($_POST['description'])) 
	{
	$description = $_POST['description'];
	} 
else
	{
	$description = NULL;
	echo '<p class="error">You forgot to enter your Description!</p>';
	}

// Validate the Category:
if (!empty($_POST['category'])) 
	{
	$category = $_POST['category'];
	} 
else
	{
	$category = NULL;
	echo '<p class="error">You forgot to enter your Category!</p>';
	}

// Validate the Price:

if (!empty($_POST['Price'])) 
	{
	$price = $_POST['Price'];
	} 
else
	{
	$price = NULL;
	echo '<p class="error">You forgot to enter the Price!</p>';
	}	
	
	// Validate the Tags:
if (!empty($_POST['tags'])) 
	{
	$tags = $_POST['tags'];
	} 

// if everything is OK, process the order and print the confirmation:
if ($jobTitle && $description && $category && $price )
	{
	
	echo '<script language="javascript">';
	echo 'alert("Your request has been made")';
	echo '</script>';
	
	// here is where the order goes	
	echo "<h1>Thank You!</h1>
	<p>Your request has been posted to the requested job newsfeed a service provider will be in 
	contact with you once they are willing to provide your service.<br/>
	<h2>Job Summary</h2>";
		
	echo "</table>
	<tt><b>Job Title:</b>$jobTitle</tt></p>
	<tt><b>Description:</b>$description</tt></p>
	<tt><b>Price:</b>$price</tt></p>
	<tt><b>Category:</b>$category</tt></p>
	<tt><b>Tags:</b>$tags</tt></p>
	<p>Thanks for submitting a request!!</p>
	<p>A copy of your request will be sent to your e-mail</p>\n";
	}
// missing form value	
else  
	{
	echo '<script language="javascript">';
	echo 'alert("You missed something. Please go back and fill out the form again.")';
	echo '</script>';
	}
?>
<p><b>Click here to</b> <a href="posts_service.html">Return to Job Request</a>.  </p>

</body>
</html>