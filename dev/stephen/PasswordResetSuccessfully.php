<?php session_start();?>
<html>
<head>
	<link rel="stylesheet" href="./styles.css" type="text/css" media="screen"/>
</head>
	
<body>
<div id="header">
	<h1>Password Reset Request Emailed</h1>
</div>

<?php echo "<table><tr><br><tr><table><table><tr>Your password (" . $_SESSION['newPassword'] . ") has been accepted and inserted into the database as: " . $_SESSION['newPasswordHash'] . "<tr><table>"?>

</body>
</html>