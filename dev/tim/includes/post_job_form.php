<?php
$content .= '
	<div class="row">
		<div class="col-xs-12"><h1>New Job Post</h1></div>
	</div>
	<form action="" method="post">
		<input type="hidden" name="formname" value="postJob" />
		<div class="row">
			<div class="col-xs-12 col-md-8">
				<div class="row">
					<div class="col-xs-12">
						<input type="text" name="jobTitle" placeholder="Job Title" class="full-width" />
					</div>

					<div class="col-xs-12 col-md-3">
						<input type="text" name="price" placeholder="Price" />
					</div>
					<div class="col-xs-12 col-md-3">
						<input type="checkbox" name="bidding" /> Allow Bidding
					</div>
					<div class="col-xs-12 col-md-6">
						<select name="category" class="full-width">
							<option value="">Category</option>';
							foreach ($catArr as $v)
							{
								$content .= '<option value="'. $v .'">'. $v .'</option>';
							}
							$content .= '
						</select>
					</div>
				
					<div class="col-xs-12">
						<textarea name="jobDescription" class="job_description" placeholder="Job Description"></textarea>
					</div>
				
					<div class="col-xs-8 col-sm-6">
						<input type="text" name="travelRadius" placeholder="Distance Willing to Travel" class="full-width" />
					</div>
					<div class="col-xs-4 col-md-6">
						<input type="checkbox" name="travelRadiusNA" /> Not applicable
					</div>
				
					<div class="clearfix"></div>
					<div class="col-xs-12 col-md-4">
						Add Service to Swap<br />
						<input type="text" name="serviceToSwap" class="full-width" placeholder="New Service" />
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="col-xs-12 col-md-4">
				<input type="file" name="image" /><br />
				Time Available for Job:<br />
				<input type="radio" name="timeAvailable" value="any" /> Anytime<br />
				<input type="radio" name="timeAvailable" value="cal" /> Use Master Calendar<br /><br />
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 right">
				<input type="submit" value="Submit Job" />
			</div>
		</div>
	</form>
'."<br />\r\n";
?>