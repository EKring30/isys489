<?php session_start(); ?>

<html>
<head>
	<link rel="stylesheet" href="./styles.css" type="text/css" media="screen"/>
</head>
	
<body>
<div id="header">
	<h1>Enter New Password</h1>
</div>


<?php 
if ( ISSET($_SESSION['newPasswordNotComplex']) ) {
	echo "<h1>Your password did not meet complexity requirements... Please try again.</h1>";
}
elseif ( ISSET($_SESSION['newPasswordNotMatch']) ){
	echo "<h1>Your passwords did not match... Please try again.</h1>";
}
unset($_SESSION['newPasswordNotComplex']);
unset($_SESSION['newPasswordNotMatch']);
?>

<?php if ( $_SESSION['passwordResetToken'] == $_GET["passwordResetToken"] ) :
	echo "<h1>Your password token is... " . $_GET["passwordResetToken"] ." </h1>";
?>
<form action="handleResetPassword.php" method="post" >
<input type="hidden" name="formname" value="changes_password" />
<p> 

<h1 id="main">Update Password</h1>									

	<label for="newPassword">
	New Password: <br>
		<input type="password" id="newPassword" name="newPassword" size="56" maxlength="30" placeholder="" />
	</label> <br><br>

	Confirm New Password: <br>
	<label for="confirmNewPassword">
		<input type="password" id="confirmNewPassword" name="confirmNewPassword" size="56" maxlength="30" placeholder="" />
	</label><br><br>

	 <input type="submit" name="submit" id="submit" value="Update Password" />
	
</form>	


<?php else : ?>
	<h1>Your password token does not match the one on file for your account...</h1>
<?php endif; ?>

</body>
</html>