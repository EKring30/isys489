<!--  Eric Siegel
	  ISYS 489  
	  posts_service.php
	  Allows a user to post a service that they would like someone to do. ---->
<?php include 'includes/header2.php' ?>
<!DOCTYPE html>
<html>
	<head>
<?php
		// Session Management Section 
		// Author:  Tim Hansen - 2015
	
		// Start the session 
		//session_start();
		$title = "Service Swap - Post Service";
		$page = "Post Service";
		$content = "";

		if (isset($_SESSION["notice"]))
			{
				$content .= '<div class="alert alert-success" role="alert">'.$_SESSION["notice"].'</div><br /><br />'."\r\n";
				unset($_SESSION["notice"]);
			}
?>	
		<style>
			body {
					background-color: #ffffff;
					margin-left: 5%;
					margin-right:  5%;
					border:  1px dotted grey;
					padding: 10px 10px 10px 10px;
					font-family: sans-serif;
				}
		</style>
	</head>
	<body>
		<!--   -->
		<input type="hidden" name="formname" value="postService" />
			<p> <h1>Job Request</h1>
			
		<form action="posts_service_createService.php" method="POST" onsubmit="return formIsReady(this);">
			<fieldset id="jobinfo">
				<legend><span>This request will be available for others to review.</span></legend><br>
				
					<p>Job Title <br><input type="text" name="jobtitle" id="jobtitle" size="56" maxlength="80" placeholder=""
									 value="<?php if (isset($_POST['jobtitle'])) echo $_POST['jobtitle']; ?>" /><br><span class="err"></span></label><br/> 
									 
					<p>Description <br><input type="text" name="a_description" id="a_description" size="56" maxlength="250"
									value="<?php if (isset($_POST['a_description'])) echo $_POST['a_description']; ?>" /><br><span class="err"></span></label><br/>					
										
					<p> Price<br>
					<input type="text" name="price" id="price" size="37" maxlength="12" placeholder="Max in US dollars you will pay"
									 value="<?php if (isset($_POST['price'])) echo $_POST['price']; ?>" /><br><span class="err"></span></label><br/>
					
						<p>Category <br>
						<select id="category" name="category">		 
							<option value="">Category</option>
							<option value="Yard Work">Yard</option>
							<option value="Business">Business</option>
							<option value="Repairs">Repairs</option>
							<option value="Creative">Creative</option>
							<option value="Beauty">Beauty</option>
							<option value="Mechanical">Mechanical</option>
							<option value="Automotive">Automotive</option>
							<option value="Computers">Computers</option>
							<option value="Event">Event</option>
							<option value="Household">Household</option>
							<option value="Labor / Moving">Labor / Move</option>
							<option value="Legal">Legal</option>
							<option value="Lessons">Lessons</option>
							<option value="Marine">Marine</option>
							<option value="Pets">Pets</option>
						</select>
						<br><span class="err"></span></label><br/>
						
	
					<p>Tags <br><input type="tags" name="tags" id="tags" size="57" maxlength="80" placeholder="Each tag should be separated by a comma" />
					<br><br>	
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;
				
					<input type="submit" class="exsbm" value="Request Service" disabled="true"/> 	 
			</fieldset>
		</form>	 
		<script type="text/javascript">

// object to validate form fields when they lose focus, via Ajax
var checkFormElm = function() {
  // from: http://coursesweb.net/ajax/
  var phpcheck = 'posts_serviceCheck.php'; // Here add the php file that validate the form element
  var err = {}; // stores form elements name, with value of 1 for invalid, and value 0 for valid

  // change the css class of elm
  var setelm = function(elm, val) {
    // if val not empty, sets in err an item with element name, and value of 1
    // sets border to this form element,
    // else, sets in err an item with element name, and value of 0, and removes the border
    if(val != '') {
      err[elm.name] = 1;
      elm.className = 'errinp';
      if(elm.form.querySelector('.exsbm')) elm.form.querySelector('.exsbm').setAttribute('disabled', 'disabled'); // disables the submit
      elm.parentNode.querySelector('.err').innerHTML = val;     //  adds the error message
    }
    else {
      err[elm.name] = 0;
      elm.className = 'vinp';
      elm.parentNode.querySelector('.err').innerHTML = '';     //  removes the error message

      // check if invalid items in $err (with value 1)
      var inv = 0;
      for (var key in err) {
        if(err[key] == 1) {
          inv = 1;
          break;
        }
      }
			
      // if not invalid element, enables the submit button
      if(inv == 0 && elm.form.querySelector('.exsbm')) elm.form.querySelector('.exsbm').removeAttribute('disabled');
			
    }
  }

  // sends data to a php file, via POST, and displays the received answer
  this.checkAjax = function(elm) {
    if(elm.value != '') {
      var xmlHttp =  (window.ActiveXObject) ? new ActiveXObject("Microsoft.XMLHTTP") : new XMLHttpRequest();    // gets the XMLHttpRequest instance

      // create pairs index=value with data that must be sent to server
      var  datatosend = elm.name +'='+ elm.value;

      xmlHttp.open("POST", phpcheck, true);      // set the request to php file

      // adds  a header to tell the PHP script to recognize the data as is sent via POST
      xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xmlHttp.send(datatosend);     // calls the send() method with data as parameter

      // Check request status
      xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4) setelm(elm, xmlHttp.responseText);
      }
    }
    else setelm(elm, 'This field must be completed.');
  }
}

var chkF = new checkFormElm(); // object instance of checkFormElm()

// HERE register onblur event to form elements that must be validated with PHP via Ajax
document.getElementById('jobtitle').onblur = function() { chkF.checkAjax(this);}
document.getElementById('a_description').onblur = function() { chkF.checkAjax(this);}
document.getElementById('category').onblur = function() { chkF.checkAjax(this);}
document.getElementById('price').onblur = function() { chkF.checkAjax(this);}
</script>
<br/>
	</body>
<?php 
/* 	posts_service.php
 	ISYS489 Spring 2015
	Author:  Eric Siegel's altering of Paul Gerndt's original signup.php

	Description:
 	Part one of the posting service process.  This page takes job title,
	description, category, and price then validates them.
	If initial validation passes, values are passed to the database
*/
//	Import functions
// include_once('includes/validatePW.php'); // Original script for testing
//include_once('includes/validations.php'); // Master field/form validation scripts

//// Declare/Initialize VARS
if(isset($_POST['jobtitle'])) $d = $_POST['jobtitle'];
if(isset($_POST['a_description'])) $n = $_POST['a_description'];
if(isset($_POST['category'])) $c = $_POST['category'];
if(isset($_POST['price'])) $p = $_POST['price'];
?>
</html>
