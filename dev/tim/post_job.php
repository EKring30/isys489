<?php
	session_start();
	include('includes/global-vars.php');
	include('includes/session_validation.php');
	include('includes/validations.php');

	if (!session_is_valid())
	{
		$_SESSION['notice'] = "Error - you must sign in to view this page.";
		header('Location: logout.php');
	}

	$title = "Post a Job";
	$page = "post_job";

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
			echo "Form is valid.<br />\r\n";
	}

	include('includes/post_job_form.php');
	include('includes/template.php');
?>