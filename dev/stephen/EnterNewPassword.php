<html>
<head>
	<link rel="stylesheet" href="./styles.css" type="text/css" media="screen"/>
</head>
	
<body>
<div id="header">
	<h1>Enter New Password</h1>
</div>

<?php echo "<h1>Hello " . $_GET["name"] ." </h1>"; ?>

<div id="login_form">
    <form name="f1" method="post" action="./Scripts/ResetPassword.php" id="f1">
        <table>
		    <tr>
                <td class="f1_label">Enter New Password:</td><td><input type="text" placeholder="johndoe@gmail.com" name="passwordResetEmail" value="" />
                </td>
            </tr>
		</table>
    </form> 
</div>

</body>
</html>