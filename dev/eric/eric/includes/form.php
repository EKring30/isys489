<?php
include('database.php');
global $my_dbhandle;

$states_query = "SELECT id, name FROM states";
$state_res = $my_dbhandle->query($states_query);

$countries_query = "SELECT id, country_name FROM countries";
$country_res = $my_dbhandle->query($countries_query);

$content .= '<br />
		<div class="row">
			<div class="col-md-8 col-md-offset-4 left"><b>Fill out the following fields:</b></div>
		</row>
		<form method="post" action="test_form.php">
			<input type="hidden" name="formname" value="serviceConsumer" />
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-4 right">First Name:</div>
			<div class="col-xs-12 col-sm-6 col-md-8 left"><input type="text" name="firstName" /></div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-4 right">Last Name:</div>
			<div class="col-xs-12 col-sm-6 col-md-8 left"><input type="text" name="lastName" /></div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-4 right">Address 1:</div>
			<div class="col-xs-12 col-sm-6 col-md-8 left"><input type="text" name="address1" /></div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-4 right">Address 2:</div>
			<div class="col-xs-12 col-sm-6 col-md-8 left"><input type="text" name="address2" /></div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-4 right">City:</div>
			<div class="col-xs-12 col-sm-6 col-md-8 left"><input type="text" name="city" /></div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-4 right">State:</div>
			<div class="col-xs-12 col-sm-6 col-md-8 left">
				<select name="state">
					<option>Select a State</option>';
				if (!empty($state_res))
				{
					while ($row = $state_res->fetch_assoc())
					{
					    $content .= '<option value="'.$row['id'].'">'.$row['name']."</option>\r\n";
					}
					$state_res->free();
				}
				$content .= '</select>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-4 right">Zip:</div>
			<div class="col-xs-12 col-sm-6 col-md-8 left"><input type="text" name="zip" /></div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-4 right">Country:</div>
			<div class="col-xs-12 col-sm-6 col-md-8 left">
				<select name="country">
					<option>Select a Country</option>';
				if (!empty($country_res))
				{
					while ($row = $country_res->fetch_assoc())
					{
					    $content .= '<option value="'.$row['id'].'">'.$row['country_name']."</option>\r\n";
					}
					$country_res->free();
				}
				$content .= '</select>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-4 right">Date of Birth:</div>
			<div class="col-xs-12 col-sm-6 col-md-8 left"><input type="text" id="datepicker" name="dob" /></div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-4 right">Phone:</div>
			<div class="col-xs-12 col-sm-6 col-md-8 left"><input type="tel" name="phone" /></div>
		</div>
		<div class="row">
			<div class="col-md-8 col-md-offset-4 left">Format: XXX-XXX-XXXX</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-4 right">Phone Type:</div>
			<div class="col-xs-12 col-sm-6 col-md-8 left">
				<select name="phoneType">
					<option value="home">Home</option>
					<option value="work">Work</option>
					<option value="cell">Cell</option>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-4 right">Email:</div>
			<div class="col-xs-12 col-sm-6 col-md-8 left">
				<input type="email" name="email" />
				<input type="hidden" name="domainCheck" value="true" />
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-4 right">Preferred method of contact:</div>
			<div class="col-xs-12 col-sm-6 col-md-8 left">
				<select name="prefContactMethod">
					<option value="phone">Phone</option>
					<option value="email">E-mail</option>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-4 right">Nickname:</div>
			<div class="col-xs-12 col-sm-6 col-md-8 left"><input type="text" name="nickname" /></div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-4 right">Travel Radius:</div>
			<div class="col-xs-12 col-sm-6 col-md-8 left"><input type="text" name="travelRadius" /> mile(s)</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-4 right">Username:</div>
			<div class="col-xs-12 col-sm-6 col-md-8 left"><input type="text" name="username" /></div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-4 right">Password:</div>
			<div class="col-xs-12 col-sm-6 col-md-8 left"><input type="password" name="pwd" id="pwd" /></div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-4 right">Do you agree to our terms?</div>
			<div class="col-xs-12 col-sm-6 col-md-8 left"><input type="checkbox" name="terms" value="terms"></div>
			<div class="col-xs-12"><input type="submit" value="Submit" class="btn" /></div>
		</div>
		<div class="clearfix"></div>
		</form>
		<br /><br />'."\r\n";

$jquery = '$("#datepicker").datepicker({
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            yearRange: "-100:+0",
            dateFormat: "yy-mm-dd"
            });'."\r\n";
?>