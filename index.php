<?php
session_start();

//require_once('config.php');
require_once('app/functions.php');

require_once('vendor/autoload.php');

require_once('sendmail.php');
//Definigng the variables

$commonEmail="zahirul.arb@gmail.com";

$user_id =$message="";

if (isset($_SESSION['user_id'])) {
	$user_id = $_SESSION['user_id'];
	if(isset($_POST['lati']) && isset($_POST['longi'])){
		$latitude   = $_POST['lati'];
		$longitude  = $_POST['longi'];
		$rescueType = $_POST['rescueType'];
		$name       = $_POST['name'];

	    $ip = $_SERVER['SERVER_ADDR'];

	    $sql = "INSERT INTO rescue (rescue_id, type, status, created_at)
					VALUES('$user_id', '$rescueType','1',NOW())";

		if($conn->query($sql) ===TRUE){
			$message = "Your Rescue request has been sent to friends and rescue team!";

		}

	}

} else{
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
						$message = "Your Rescue request has been sent to friends and rescue team!";

						// Sending rescue email
						sendRescueEmail($commonEmail,$last_id,$rescueType);

						//ctreating session
						$_SESSION['user_id'] = $last_id;
						$_SESSION['user_ip'] = $ip;
					}
			
		}else{
			echo $conn->error;
		}
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
    
    <div class="container" ng-controller="profileCtrl" ng-init="getProfile()">
    <?php  require_once('menu.php'); ?>
    <h1>Rescue Me Application . Hackathon 2016</h1>
    	<?php echo $message; ?>

	    <form role="form" method="post" action="">
	    	<div class="form-group">
	    		<label>Your Name:</label>
	    		<?php if(!empty($_SESSION['user_id'])){?>
	    		<input type="text" class="form-control" name="name"  ng-value="fullname" value="" placeholder="Your Name" value="{{firstname}}">
	    		<?php }else{?>
	    		<input type="text" class="form-control" name="name"  value="" placeholder="Your Name" value="">
	    		<?php }?>
	    		
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
		    <?php if(!empty($_SESSION['user_id'])){?>
		    <div ng-init="getGEO()">
		    <input type="hidden" ng-value="lati" id="latitude" name="lati" value="" />
		    <input type="hidden" ng-value="longi" id="longitude" name="longi" value="" />
		    </div>
		    <?php }else{?>
		    <div ng-init="getGEO()">
		    {{test}}
		    <input type="hidden" ng-value="lati" id="latitud" name="lati" value="" />
		    <input type="hidden" ng-value="longi"  id="longitud" name="longi" value="" />
		    </div>

		    <?php }?>
		    
		    
		    <button type="submit" class="btn btn-default">Help Me</button>
		</form>
    	
    </div>

    <div class="container">
    		<div  ng-controller="geoCtrl"> 
    		<div >
    		<h4>Currently for Resque</h4>
    			 

				 <ul class="list-group" ng-repeat="person in content"> <!-- list-group -->
              
		            <li class="list-group-item well well-sm">
		              <h5>{{person.firstname}}{{person.lastname}}</h5>
		                <img class="img-circle" src="http://www.gravatar.com/avatar/{{person.id}}?d=mm&s=70">
		             <p>He/She is in {{person.rescuetype}}</p>
		             <a href="location.php?id={{person.id}}">Show Location</a>
		               
		            </li> <!-- list-group-item -->
		          
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