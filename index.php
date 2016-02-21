<?php
session_start();

//require_once('config.php');
require_once('app/functions.php');

require_once('vendor/autoload.php');


if (isset($_POST['lati']) && isset($_POST['longi'])) {
	$latitude   = $_POST['lati'];
	$longitude  = $_POST['longi'];
	$rescueType = $_POST['rescueType'];
	$name       = $_POST['name'];

    $ip = $_SERVER['SERVER_ADDR'];

	$sql = "INSERT INTO users (first_name, latitude, longitude, user_ip, created_at)
            VALUES ('$name', '$latitude', '$longitude', '$ip',NOW())";

		if ($conn->query($sql)===TRUE) {

			$last_id = $conn->insert_id;
			$sql2 = "INSERT INTO rescue (rescue_id, type, status, created_at)
					VALUES('$last_id', '$rescueType','1',NOW())";

					if($conn->query($sql2) ===TRUE){
						echo "Your Rescue request has been sent to friends and rescue team!";

						$_SESSION['user_id'] = $last_id;
						$_SESSION['user_ip'] = $ip;
					}
			
		}else{
			echo $conn->error;
		}
}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Rescue me</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>

   
  </head>
  <body ng-app="rescueApp">
    
    <div class="container">
    <?php  require_once('menu.php'); ?>
    <h1>Rescue Me Application . Hackathon 2016</h1>

	    <form role="form" method="post" action="">
	    	<div class="form-group">
	    		<label>Your Name:</label>
	    		<input type="text" class="form-control" name="name" value="" placeholder="Your Name">
	    		
	    	</div>
		    <div class="form-group">
		      <label for="email">Select One:</label>
		      <select class="form-control" name="rescueType">
		      	<option value="danger">I am in Danger</option>
		      	<option value="fire">I am in Fire</option>
		      	<option value="accident">I am in Accident</option>
		      	<option value="collapsed">I am in Collapsed</option>
		      	<option value="ill">I am in Ill</option>
		      	<option value="help">I am in Help</option>
		      </select>
		    </div>

		    <input type="hidden" id="latitude" name="lati" value="" />
		    <input type="hidden" id="longitude" name="longi" value="" />
		    
		    
		    <button type="submit" class="btn btn-default">Help Me</button>
		</form>
    	
    </div>

    <div class="container">
    		<div  ng-controller="geoCtrl"> 
    		<div >
    			  <ul>
				    <li ng-repeat="x in content">
				      {{x.id}}</em>
				      {{x.longi}}</em>
				    </li>
				  </ul>

    		</div>
    		<p onclick="sound()">Play</p>
    		<div ng-init="showLocation()">
    			<p ng-value="showLocation"></p>
    		</div>
			
			

			</div>
    	
    </div>
    
    <img id="image" src="images/circle.png" alt="" width="300" height="300">
   



<audio id="bell1">
  <source src="sounds/FireTruckSiren.mp3" type="audio/mp3">
</audio>
<audio id="bell2">
  <source src="sounds/FireTrucksSirens2.mp3" type="audio/mp3">
</audio>
<audio id="bell3">
  <source src="sounds/SirenSoundBible.mp3" type="audio/mp3">
</audio>




  <?php  require_once('footer.php'); ?>
  </body>
</html>