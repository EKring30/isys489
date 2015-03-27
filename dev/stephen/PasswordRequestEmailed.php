<?php session_start();?>
<html>
<head>
	<link rel="stylesheet" href="./styles.css" type="text/css" media="screen"/>
</head>
	
<body>
<div id="header">
	<h1>Password Reset Request Emailed</h1>
</div>

<?php echo "<table><tr><br><tr><table><table><tr><h1>Your password token is has been sent to: " . $_SESSION['passwordResetEmail'] ."</h1><tr><table><table><tr>Please follow the instructions in the email to reset your password...<tr><table>"?>

</body>
</html>