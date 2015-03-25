<?php
// set cookie information from ForgotPassword.html
session_start();

// if($_POST['passwordResetEmail'] is in database) 
	$message = "Hello, we received a password reset request for ServiceSwap account. To reset your password, please use the following URL: http://grserviceswap.isys489.com/dev/stephen/EnterNewPassword.php?name=" . md5($_POST['passwordResetEmail'] . time());
	mail($_SESSION['passwordResetEmail'], 'Subject', $message, 'From: webmaster@example.com');
// else
	$_SESSION['badEmailAddress'] = true;
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=../ForgotPassword.php\">";
 
?>

/*
Tim Hansen	8:46 PM
sup guys
Ba Toerin joined group chat.
	
Tim Hansen	8:56 PM
Paul - I implemented a date field on my test form that I created. You can use it as an example, and if it's relevant - copy code from it to hopefully make your life easier. http://grserviceswap.isys489.com/dev/tim/test_form.php
https://github.com/willc0de4food/isys489/blob/master/dev/tim/includes/form.php
Brittany - check lines 20-35 here: https://github.com/willc0de4food/isys489/blob/master/dev/tim/test_form.php
Emily Kring joined group chat.
	
Paul Gerndt	9:02 PM
Thanks Tim
	
Emily Kring	9:02 PM
hi all
sorry
I couldnt find my headphones
	
Tim Hansen	9:11 PM
https://github.com/willc0de4food/isys489/blob/master/dev/tim/logout.php
	
Paul Gerndt	9:15 PM
Isn't session management, login, and logout all handled in the header?
	
Tim Hansen	9:16 PM
i think she's talking about a web page header
Beth Russell joined group chat.
	
Paul Gerndt	9:18 PM
13
	
Eric Siegel	9:18 PM
13
	
Paul Gerndt	9:27 PM
Have we lost Jake?
	
Eric Siegel	9:27 PM
No
	
Paul Gerndt	9:28 PM
Good
Emily Kring joined group chat.
Emily Kring left group chat.
	
Tim Hansen	9:38 PM
i'm good
thanks guys
*/