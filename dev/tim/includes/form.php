<?php
$content .= '<br />
		<b>Enter a string to be hashed:<br />
		<form method="post" action="pw.php" name="pwhash">
		Username: <input type="text" name="username" /><br />
		Password: <input type="password" name="pw" id="pw" /><br />
		Date of Birth: <input type="text" id="datepicker" name="dob" /><br />
		Do you agree to our terms? <input type="checkbox" name="terms" value="terms"><br />
		<input type="submit" value="Hash It" />
		</form>'."\r\n";

$jquery = '$("#datepicker").datepicker({
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            yearRange: "-100:+0",
            dateFormat: "yy-mm-dd"
            });'."\r\n";
?>