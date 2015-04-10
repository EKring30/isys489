<!--  Eric Siegel
	  ISYS 489  
	  posts_service_createService.php
	  creates the service in the database. ---->
<?php
include_once 'includes/database.php';


// Initialize Variables
$GoodToGo = True;
if(isset($_REQUEST['jobtitle'])) $jtit = $_REQUEST['jobtitle']; else $GoodToGo = False;
if(isset($_REQUEST['description'])) $des = $_REQUEST['description']; else $GoodToGo = False;
if(isset($_REQUEST['category'])) $cat = $_REQUEST['category']; else $GoodToGo = False;
if(isset($_REQUEST['price'])) $pri = $_REQUEST['price']; else $GoodToGo = False;

// Write record to the database

//create_service('Disc Jockey','Rocks the Party','Creative','600.00');
if($GoodToGo) create_service($jtit, $des, $cat, $pri);

function create_service($jtit, $des, $cat, $pri)
{
        global $my_dbhandle;
        // prepare and bind
        $stmt = $my_dbhandle->prepare("INSERT INTO `Service` (`jobtitle`, `description`, `category`, `price`) VALUES (?, ?, ?, ?)");
        //$stmt = $my_dbhandle->prepare("INSERT INTO users ('jobtitle', 'description', 'category', 'price') VALUES (':jtit', ':des', ':cat', ':pri')");
        if($stmt != false) // DB NEW SQL Object Call was Successful
		{
			// Bind Parameters
			$stmt->bind_param("ssss", $jtit, $des, $cat, $pri);
			
			//Execute the statement
			$stmt->execute();

			// Close the connection
			$stmt->close();
		}
		Else
		{
			die('prepare() failed: ' . htmlspecialchars($my_dbhandle->error));
			printf('Sorry - Database call failed!!  Try again later');
		}
}

?>

<script type="text/javascript">
    function myfunc () {
       top.close();   // Closes the new window
    }
	alert('Thank You!   Your request has been posted to the requested job newsfeed.  A service provider will be in contact with you once they are willing to provide your service.');
    window.onload = myfunc;
</script>
</html>