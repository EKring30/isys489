<?php
session_start();

include('./includes/validations.php');

$newPassword = $_POST['newPassword'];
$confirmNewPassword = $_POST['confirmNewPassword'];
$passwordIsValid = validate_password($_POST['newPassword']);

if ( $passwordIsValid ){
	if( $newPassword == $confirmNewPassword ){
		$_SESSION['newPassword'] = $newPassword;
		$_SESSION['newPasswordHash'] = md5($newPassword . "Cheap salt...");
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=./PasswordResetSuccessfully.php\">";
	}
	else{
		$_SESSION['newPasswordNotMatch'] = TRUE;
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=./ResetPassword.php?passwordResetToken=" . $_SESSION['passwordResetToken'] . "\">";
	}
}
else{
	$_SESSION['newPasswordNotComplex'] = TRUE;
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=./ResetPassword.php?passwordResetToken=" . $_SESSION['passwordResetToken'] . "\">";
}
?>