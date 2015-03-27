<?php

// Jake Brunner
// Date created 2/16/15
//Create admin account

// Enter modifications here:
/*
Edit 3/10 made form sticky - JB

*/



if ($_SERVER['REQUEST_METHOD'] == 'POST') {


	$pageTitle = 'Create Admin Account';
	require ('../mysqli_connect.php'); // Connect to the db.
	include('includes/validations.php');
	
	$errors = array(); // Initialize an error array.
	
	// Check for first name:
	if (empty($_POST['firstName'])) {
		$errors[] = 'You forgot to enter your first name!';
	} else {
		$fn = mysqli_real_escape_string($dbc, trim($_POST['firstName'])); //fn = firstName
	} 
	
	// Check for an last Name:
	if (empty($_POST['lastName'])) {
		$errors[] = 'You forgot to enter your Last Name!';
	} else
		$ln = mysqli_real_escape_string($dbc, trim($_POST['lastName'])); // ln = lastName
	}
	
	// Check for an Address:
	if (empty($_POST['address'])) {
		$errors[] = 'You forgot to enter your Address!.';
	} else {
		$a = mysqli_real_escape_string($dbc, trim($_POST['address'])); // a = address
	}
	
	// Check for a city:
	if (empty($_POST['city'])) {
		$errors[] = 'You forgot to enter your city.!';
	} else {
		$c = mysqli_real_escape_string($dbc, trim($_POST['city'])); // c = city
	}
	
	// Check for a State:
	if (empty($_POST['state'])) {
		$errors[] = 'You forgot to enter your state or province/region!';
	} else {
		$s = mysqli_real_escape_string($dbc, trim($_POST['state'])); // s = state
	}
	
	// Check for a Zip:
	if (empty($_POST['zip'])) {
		$errors[] = 'You forgot to enter your zip code!';
	} else {
		$z = mysqli_real_escape_string($dbc, trim($_POST['zip'])); // z = zip
	}
	//Check for a country:
	if (isset($_POST['country'])){
	$co = $_POST['county'];
	}
	else{
	$co = "";
	echo '<p class ="error"> You forgot to select your country.</p>'; // co = country
	}
	
	//Check for phone type
	if (isset($_POST['phoneType'])){
	$pt = $_POST['phoneType'];
	}
	else{
	$pt = "";
	echo '<p class = "error"> You forgot to select your country. </p>'; // pt = phone type
	
	
	// Check for a phone number:
	if (empty($_POST['phone'])) {
		$errors[] = 'You forgot to enter your phone number!';
	} else {
		$p = mysqli_real_escape_string($dbc, trim($_POST['phone'])); // p = phone
	}
	
	// Check for a Email:
	if (empty($_POST['email'])) {
		$errors[] = 'You forgot to enter your email Address!';
	} else {
		$e = mysqli_real_escape_string($dbc, trim($_POST['email'])); // e = email
	}
	
	
	if (empty($errors)) { // If everything's OK.
	
		// Register the user in the database...
		
		// Make the query:
		$q = "INSERT INTO books (firstName, lastName, address, state, zip, country, phoneType, phone, email) VALUES ('$fn', '$ln', '$a', '$c', '$s', '$z', '$co', '$pt', '$p', '$e')";		
		$r = @mysqli_query ($dbc, $q); // Run the query.
		if ($r) { // If it ran OK.
		
			// Print a message:
			echo '<h1>Thank you!</h1>
		<p>Admin user has been created!</p><p><br /></p>';	
		
		} else { // If it did not run OK.
			
			// Public message:
			echo '<h1>System Error</h1>
			<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>'; 
			
			// Debugging message:
			echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
						
		} // End of if ($r) IF.
	
	
	
	
	
	mysqli_close($dbc);

// create html form
?>
<form action ="adminAccount.php" method="post">

   <p> * Indicates a required field </p>
   <p>First Name: <input type="text" name="firstName" value = "<?php if (isset($_POST['firstName'])) echo $_POST['firstName']; ?>"/> * </p> 
 
   <p>Last Name: <input type="text" name="lastName" value = "<?php if (isset($_POST['lastName'])) echo $_POST['lastName']; ?>"/> * </p>
 
   <p>Primary Address: <input type="text" name="address" value = "<?php if (isset($_POST['address'])) echo $_POST['address']; ?>"/> * </p>
   
   <p>Secondary Address: <input type ="text" name="secondAddress" value = "<?php if (isset($_POST['secondAddress'])) echo $_POST['secondAddress']; ?>"/>  </p>
   
   <p>City: <input type = "text" name ="city" value = "<?php if (isset($_POST['city'])) echo $_POST['city']; ?>"/>* </p>
   
   <p>State/province/region <input type = "text" name = "state" value = "<?php if (isset($_POST['state'])) echo $_POST['state']; ?>"/> * </p>
   
   <p>Zip/Postal code <input type ="text" name = "zip" value = "<?php if (isset($_POST['zip'])) echo $_POST['zip']; ?>"/> *  </p>
   
   <p>Country <select name ="country">
     
	 <option value = "" > Select </option>
	 <option value = "United States"> United States </option>
	 <option value = "Canada"> Canada </option>
	 <option value = "Mexico"> Mexico </option>
	 
	</select> * </p> <br>
 <?php   
<p> Birthday: 	
<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-4 right">Date of Birth:</div>
			<div class="col-xs-12 col-sm-6 col-md-8 left"><input type="text" id="datepicker" name="dob" /></div>
		</div>
 </select> * </p> <br>
 ?>
</P>
  
   <p>Phone Type: <select name ="phoneType">
 
     <option value="">Select...</option>
     <option value ="Mobile"> Mobile </option>
     <option value ="Home"> Home</option>
     <option value ="Work"> Work </option>
  
  </select> * </p> <br> 
  
   <p>Phone number: <input type = "text" name = "phone" value = "<?php if (isset($_POST['phone'])) echo $_POST['phone']; ?>"/> * </p>
  
  
   <p> Email: <input type ="email" name = "email" value = "<?php if (isset($_POST['phone'])) echo $_POST['phone']; ?>"/> * </p>

   <p>User name: <input type ="text" name ="userName" value = "<?php if (isset($_POST['userName'])) echo $_POST['userName']; ?>"/> *</p>
   
   <p>Password: <input type ="password" name = "password" /> *</p>
   
   <p>Confirm Password: <input type ="password" name ="confirmPass" /> * </p>
   
   <p>Check to agree to the terms and conditions of grServicesSwap <input type="checkbox" name="conditions" value="I agree"> I agree </P>
   
   <p><input type="submit" name="submit" value="Register" /></p>

 <?php $jquery = '$("#datepicker").datepicker({
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            yearRange: "-100:+0",
            dateFormat: "yy-mm-dd"
            });'."\r\n";
?>
</form>
