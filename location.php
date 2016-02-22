<?php
session_start();

//require_once('config.php');
require_once('app/functions.php');

require_once('vendor/autoload.php');

require_once('sendmail.php');
//Definigng the variables

$commonEmail="zahirul.arb@gmail.com";

$user_id =$message="";

if(isset($_GET['id'])){
	$rescue_id = $_GET['id'];

	$sql="SELECT * 
FROM users
INNER JOIN rescue
ON rescue.rescue_id=users.id WHERE users.id='$rescue_id'";

$result= $conn->query($sql);
if($result){
	

	while($row = $result->fetch_array()){

		$firstname = $row['first_name'];
		$lastname = $row['last_name'];
		$rescue_for = $row['type'];
	    $res_lati = $row['latitude'];
		$res_longi =$row['longitude'];
		$mobile = $row['mobile'];

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
<style>
#mapdiv {
	margin: 0;
	padding: 0;
	width: 500px;
	height: 500px;
}
</style>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true"></script>
<script>
	var watchId = null;
	function geoloc() {
	if (navigator.geolocation) {

		console.log('got longitude');
		var optn = {
				enableHighAccuracy : true,
				timeout : Infinity,
				maximumAge : 0
		};
	watchId = navigator.geolocation.watchPosition(showPosition, showError, optn);
	} else {
			alert('Geolocation is not supported in your browser');
	}
	}

function showPosition(position) {

		console.log('Lati:'+position.coords.latitude);
		console.log('LOong:'+position.coords.longitude);
		 var getlati =document.getElementById('userlati').innerHTML;
		 console.log('Systm'+getlati)
		 var getlongi = document.getElementById('userlongi').innerHTML;

		var googlePos = new google.maps.LatLng(getlati,getlongi);
		var mapOptions = {
			zoom : 12,
			center : googlePos,
			mapTypeId : google.maps.MapTypeId.ROADMAP
		};
		var mapObj = document.getElementById('mapdiv');
		var googleMap = new google.maps.Map(mapObj, mapOptions);
		var markerOpt = {
			map : googleMap,
			position : googlePos,
			title : 'Now Here is <?php echo $firstname. " ".$lastname; ?>',
			animation : google.maps.Animation.BOUNCE
		};
		var googleMarker = new google.maps.Marker(markerOpt);
		var geocoder = new google.maps.Geocoder();
		geocoder.geocode({
			'latLng' : googlePos
			}, function(results, status) {
				if (status == google.maps.GeocoderStatus.OK) {
				if (results[1]) {
					var popOpts = {
						content : results[1].formatted_address,
						position : googlePos
					};
				var popup = new google.maps.InfoWindow(popOpts);
				google.maps.event.addListener(googleMarker, 'click', function() {
				popup.open(googleMap);
			});
				} else {
					alert('No results found');
				}
				} else {
					console.log('Geocoder failed due to: ' + status);
				}
			});
			}

			function stopWatch() {
				if (watchId) {
					navigator.geolocation.clearWatch(watchId);
					watchId = null;

				}
			}

		function showError(error) {
		var err = document.getElementById('mapdiv');
		switch(error.code) {
		case error.PERMISSION_DENIED:
		err.innerHTML = "User denied the request for Geolocation."
		break;
		case error.POSITION_UNAVAILABLE:
		err.innerHTML = "Location information is unavailable."
		break;
		case error.TIMEOUT:
		err.innerHTML = "The request to get user location timed out."
		break;
		case error.UNKNOWN_ERROR:
		err.innerHTML = "An unknown error occurred."
		break;
		}
		}
		</script>
   
  </head>
  <body ng-app="rescueApp" onload="geoloc()">
    
    <div class="container" ng-controller="profileCtrl" ng-init="getProfile()">
    <?php  require_once('menu.php'); ?>
    <h1>Rescue Me Application . Hackathon 2016</h1>
    	<?php echo $message; ?>


    	

		<div class="row">
			<div class="col-sm-6">
				<p id="userlati" style="visibility: hidden;"><?php  echo $res_lati;?></p>
		    	<p id="userlongi" style="visibility: hidden;"><?php  echo $res_longi;?></p>
		    	<p id = 'mapdiv'></p>
				<button onclick="stopWatch()">
					Stop
				</button>
						
			</div>
			<div class="col-sm-6">

			<h1><?php echo $firstname. " ".$lastname; ?></h1>
			<p>He/She need rescue for <?php echo $rescue_for; ?></p>
			<p>His/her location coordinates: <?php echo $res_lati. " - ".$res_longi; ?> </p>
			<p>mobile: <?php echo $mobile; ?></p>
				

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

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true"></script> -->




  </body>
</html>