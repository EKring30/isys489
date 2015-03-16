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
include('includes/global-vars.php');
	include('includes/validations.php');
	if (!empty($_POST))
	{
		$formIsValid = validateForm();

		if (is_array($formIsValid))
		{
			echo '<br /><div class="row"><div class="col-md-6 col-md-offset-3 bg-danger">';
			foreach ($formIsValid as $k => $v)
			{
				echo $v . "<br />\r\n";
			}
			echo '</div></div>';
		}
		else
			echo "<h1>Thank You!</h1>
	<p>Your request has been posted to the requested job newsfeed a service provider will be in 
	contact with you once they are willing to provide your service.<br/>\r\n";
	}
?>
<p><b>Click here to</b> <a href="posts_service.php">Return to Job Request</a>.  </p>

</body>
</html>