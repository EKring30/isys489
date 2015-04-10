<?php

	require('database.php'); // Connect to the db.
	require ('includes/validations.php'); 
	include ('includes/header.php');
	

$page_title = 'Create Manager Account';



// Check for form submission:
//if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	?>
<form action = "manager.php" method = "POST">
   <p> * Indicates a required field </p>
   <p>First Name: <input type="varchar" name="firstName" size="10" maxlength="20" 
                  value="<?php if (isset($_POST['firstName'])) echo $_POST['firstName'];?>" /></p> 
 
   <p>Last Name: <input type="varchar" name="lastName" size="10" maxlength="20" 
                  value="<?php if (isset($_POST['lastName'])) echo $_POST['lastName'];?>" /></p>
 
   <p>Primary Address: <input type="varchar" name="address" size="20" maxlength="40" 
                       value="<?php if (isset($_POST['address'])) echo $_POST['address'];?>"/></p>
   
   <p>Secondary Address: <input type="varchar" name="address2" size="20" maxlength="40" 
                         value="<?php if (isset($_POST['address2'])) echo $_POST['address2'];?>"/></p>
   
   <p>City: <input type="varchar" name="city" size="20" maxlength="40" 
            value="<?php if (isset($_POST['city'])) echo $_POST['city'];?>"/></p>
   
   <p>State/province/region: <input type="varchar" name="state" size="10" maxlength="40" 
                             value="<?php if (isset($_POST['state'])) echo $_POST['state'];?>"/></p>
   
   <p>Zip/Postal code: <input type="varchar" name="zip" size="6" maxlength="40" 
  value="<?php if (isset($_POST['zip'])) echo $_POST['zip'];?>"/></p>
</select></br>
   
   <p> Phone number: <input type="phone" name="phone" size="10" maxlength="40" 
value="<?php if (isset($_POST['phone'])) echo $_POST['phone'];?>" /><span class="err"/></p>
</select></br>
   
   <p>Country <select name="country">
  <option value="US"<?php echo($_POST['country']=='en'?' selected="selected"':'');?>>US</option>
    </select>
 
</select> </p> <br>
    
<p>Birth Date: <input type="date" name="dob" id="dob" size="10" maxlength="20" value="<?php if (isset($_POST['dob'])) echo $_POST['dob']; ?>"  /><span class="err"></span></label><br/>
</P>
  
   <p>Phone Type: <select name ="phoneType">
 
     <option value="">Select...</option>
     <option <?php if($phoneType=="Mobile")echo 'selected="selected"'; ?> value="Mobile">Mobile</option>
     <option <?php if($phoneType=="Home")echo 'selected="selected"'; ?> value="Home">Home</option>
     <option <?php if($phoneType=="Work")echo 'selected="selected"'; ?> value="Mobile">Work </option>
  
  </select> </p> <br> 
  
   <p>Phone number: <input type="phone" name="phone" size="10" maxlength="40" 
                    value="<?php if (isset($_POST['phone'])) echo $_POST['phone'];?>" /><span class="err"/></p>
</select></br>
  
  
   <p> Email: <input type="email" name="email" size="20" maxlength="60" 
              value="<?php if (isset($_POST['email'])) echo $_POST['email'];?>" /><span class="err"/></p>
</select></br>

   <p>User name: <input type="varchar" name="userID" size="10" maxlength="20" 
                 value="<?php if (isset($_POST['userID'])) echo $_POST['userID'];?>" /></p>
   
   <p>Password:  <input type="password" name="password" size="10" maxlength="20" 
                 value="" /></p>
   
   <p>Confirm Password:  <input type="password" name="confirmPass" size="10" maxlength="20" value=""  /></p>
   
   <p>Check to agree to the terms and conditions of grServicesSwap <input type="checkbox" name="conditions" value="I agree"> I agree *</P>
   
   <p><input type="submit" name="submit" value="Register" /></p>
   <?php include('includes/footer.php'); ?>

   

</form>