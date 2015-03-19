<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
	<title>Update Password</title>
	<link rel="stylesheet" type="text/css" media="screen" href="productStyle.css" />
	</style>
</head>
<body>
<?php # Script 1.0 - handle_form_new_password.php

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
	<p>Your password has been successfully changed.<br/>\r\n";
	}
?>
<p><b>Click here to</b> <a href="changes_password.php">Return to Change your Password</a>.  </p>

</body>
</html>