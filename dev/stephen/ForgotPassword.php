<?php session_start(); ?>		
<html>
<head>
	<link rel="stylesheet" href="./styles.css" type="text/css" media="screen"/>
</head>
	
<body>
<div id="header">
	<h1>Reset Password</h1>
</div>

<div id="login_form">
    <form name="f1" method="post" action="handleForgotPassword.php" id="f1">
        <table>
		    <tr>
                <td>Before resetting your password, we have to verify that it's really you on the other side of the keyboard.<br>
				Please enter you email address to send yourself a password reset link via email...</td>
                </td>
            </tr>
		</table>


<?php if ( isset($_SESSION['badPasswordResetEmail'])) : ?>
	<table><tr><br><tr><table><table><tr>THE EMAIL YOU ENTERED WAS INVALID...<tr><table><table><tr><br><tr><table>
<?php endif; ?>
<?php unset($_SESSION['badPasswordResetEmail']); ?>
<?php if ( isset($_SESSION['badPasswordResetEmail1'])) : ?>
	<table><tr><br><tr><table><table><tr>THE EMAIL YOU ENTERED WAS INVALID because it isn't even real...<tr><table><table><tr><br><tr><table>
<?php endif; ?>
<?php unset($_SESSION['badPasswordResetEmail1']); ?>

		<table>
            <tr>
                <td class="f1_label">Your email address here:</td><td><input type="text" placeholder="johndoe@gmail.com" name="passwordResetEmail" value="" />
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="SendPasswordResetEmail" value="Send Email" style="font-size:12px; " />
                </td>
            </tr>
        </table>
    </form> 
</div>

</body>
</html>