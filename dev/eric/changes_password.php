<!DOCTYPE html>
<html>

	<head>

		<meta charset="utf-8" />
		<title>Grand Rapids Service Swap</title>
		<link rel="stylesheet" type="text/css" media="screen" href="productStyle.css" />
		<img class="figures" src="images/Test Logo.jpg" alt="Where's the Picture??"  height="50" width="300"/>
	</head>
	<body>
		<form action="handle_form_new_password.php" method="post" >
<input type="hidden" name="formname" value="changes_password" />
			<p> 
		
        <h1 id="main">Update Password</h1>
			
					<label for="currentPassword">
					Current Password<br>
						<input type="text" id="currentPassword" name="currentPassword" size="56" maxlength="80" placeholder="" />
					</label><br><br>									
										
					<label for="newPassword">
					New Password <br>
						<input type="text" id="newPassword" name="newPassword" size="56" maxlength="30" placeholder="" />
					</label> <br><br>
	
					Confirm New Password<br>
					<label for="confirmNewPassword">
						<input type="tags" id="confirmNewPassword" name="confirmNewPassword" size="56" maxlength="30" placeholder="" />
					</label><br><br>
					
					 &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
					 &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
					 &nbsp;&nbsp;&nbsp;
					 <input type="submit" name="submit" id="submit" value="Update Password" />
			
		</form>	
	</body>
</html>