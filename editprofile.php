<?php
session_start();

//require_once('config.php');
require_once('app/functions.php');

require_once('vendor/autoload.php');

$user_id = $_SESSION['user_id'];

    

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

    </div>
    <div class="container">
      <div class="row" ng-controller="profileCtrl" ng-init="getProfile()">
      
            <form role="form" ng-submit="updateProfile()" >
            
            <div ng-if="Message" class="alert alert-danger">{{Message}}</div>
            <div class="form-group">
              <label>First Name:</label>
              <input type="text" class="form-control" ng-model="firstname" placeholder="First name" value="{{profile.firstname}}">
              
                </div>
                <div class="form-group">
                  <label>Last Name:</label>
                  <input type="text" class="form-control" ng-model="lastname" placeholder="Last name" value="{{profile.lastname}}">
                </div>
                <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="email" class="form-control" ng-model="email" id="email" placeholder="Enter email" value="{{profile.email}}">
                </div>
                <div class="form-group">
                  <label for="pwd">Password:</label>
                  <input type="password" class="form-control" ng-model="pass" id="pwd" placeholder="Enter password" required>
                </div>
                <div class="form-group">
                  <label>mobile:</label>
                  <input type="tel" class="form-control" ng-model="mobile" placeholder="contact number" value="{{profile.mobile}}">
                </div>
                
                
             
          </div>
          <div class="modal-footer">
           
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            
            <input type="submit" class="btn btn-primary" id="submit" value="Update" />
          </div>
          </form>
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