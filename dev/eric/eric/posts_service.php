<!DOCTYPE html>
<html>

	<head>

		<meta charset="utf-8" />
		<title>Grand Rapids Service Swap</title>
		<link rel="stylesheet" type="text/css" media="screen" href="productStyle.css" />
		<img class="figures" src="images/Test Logo.jpg" alt="Where's the Picture??"  height="50" width="300"/>
	</head>
	<body>
		<form action="handle_form.php" method="post" >

			<p> 
		
        <h1 id="main">Job Request</h1>
			<fieldset id="jobinfo">
				<legend><span>This request will be available for others to review.</span></legend>
						<br><br>
					<label for="job title">
					Job Title<br>
						<input type="text" id="jobtitle" name="jobtitle" size="56" maxlength="80" placeholder="" />
					</label><br><br>								
						
					<label for="description">
					Description<br>
						<textarea id="description" name="description" rows="4" cols="43"></textarea>
					</label><br><br>					
					&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					Price <br>
					<label for="category">
						<select id= "category" name="category">
						 
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
					</label>		
					&nbsp;&nbsp;
					
					<label for="Price">
						<input type="text" id="Price" name="Price" size="36" maxlength="10" placeholder="Max in US dollars you will pay" />
					</label> <br><br>
	
					Tags<br>
					<label for="tagsinput">
						<input type="tags" id="tagsinput" name="tags" size="56" maxlength="60" placeholder="Each tag should be separated by a comma" />
					</label><br><br>
					
					 &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
					 &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
					 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					 <input type="submit" name="submit" id="submit" value="Request Service" />
			</fieldset>	
		</form>	
	</body>
</html>