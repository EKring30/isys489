<?php
// set cookie information from ForgotPassword.html
session_start();

include('validations.php');
$emailIsValid = validate_email($_POST['passwordResetEmail'], TRUE);
$_SESSION['passwordResetEmail'] = $_POST['passwordResetEmail'];
$_SESSION['passwordResetToken'] = md5($_POST['passwordResetEmail'] . date() . time());
$_SESSION['passwordResetTokenDate'] = date();
$_SESSION['passwordResetTokenTime'] = time();

if ( ! $emailIsValid ) {
	$_SESSION['badPasswordResetEmail1'] = true;
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=../ForgotPassword.php\">";
}
else{
	// if($_POST['passwordResetEmail'] is in database)
	if( TRUE ) {
		// Insert $passwordResetToken into database
		$message = "Hello, we received a password reset request for ServiceSwap account. To reset your password, please use the following URL: http://grserviceswap.isys489.com/dev/stephen/EnterNewPassword.php?passwordResetToken=" . $_SESSION['passwordResetToken'];
		mail($_SESSION['passwordResetEmail'], 'Subject', $message, 'From: webmaster@example.com');
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=../PasswordRequestEmailed.php\">";
	}
	else{
		$_SESSION['badPasswordResetEmail'] = true;
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=../ForgotPassword.php\">";
	}
}
?>