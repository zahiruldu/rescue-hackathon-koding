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
      <div class="col-sm-12">
          <div class="row">
              <div class="col-sm-6">
                 <div class="col-sm-12" ng-controller="profileCtrl" ng-init="getProfile()">
                    <div class="panel panel-default">
                        <!-- Default panel contents -->
                        <div class="panel-heading">Profile Details</div>
                        <div class="panel-body">
                          <p>...</p>
                        </div>

                        <!-- List group -->
                        <ul class="list-group">
                          <li class="list-group-item">First name: {{firstname}}</li>
                          <li class="list-group-item">Last name: {{lastname}}</li>
                          <li class="list-group-item">Email: {{email}}</li>
                          <li class="list-group-item">Mobile: {{mobile}}</li>
                          <li class="list-group-item">Coordinates: {{lati}} - {{longi}}</li>
                          
                        </ul>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal"> <a href="editprofile.php"> Edit</a></button>
                        </div>
                 </div> 
              </div>
              <div class="col-sm-6" ng-controller="friendCtrl">
                  <div class="col-sm-6" ng-init="getFriends()">
                      <h3>New People</h3>
                      <ul class="list-group" ng-repeat=" friend in friends"> <!-- list-group -->
              
                            <li class="list-group-item well well-sm" ng-show="friend.status=='Not'">
                              <h5>{{friend.firstname}}{{friend.lastname}}</h5>
                                <img class="img-circle" src="http://www.gravatar.com/avatar/{{friend.email}}?d=mm&s=70">
                                <br>
                               <button ng-disabled="friend_id === friend.friend_id" ng-click="addFriend(friend.friend_id)" ng-if="friend.status=='Not'">Add to rescue</button>

                               <p ng-if="friend_id === friend.friend_id">{{Message}}</p>
                               
                            </li> <!-- list-group-item -->
                          
                        </ul>
                  </div>
                  <div class="col-sm-6" ng-init="myFriends()">
                      <h3>My Rescue Friends</h3>
                       <ul class="list-group" ng-repeat="tintin in tintins ">
                           <li class="list-group-item well well-sm">
                              <h5>{{tintin.firstname}} {{tintin.lastname}}</h5><br>
                              <img class="img-circle" src="http://www.gravatar.com/avatar/{{tintin.email}}?d=mm&s=70">
                              <button ng-click="removeRescue(tintin.friend_id)">Remove</button>
                           </li>
                         </ul>
                  </div>
              </div>
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




 <?php require_once('footer.php'); ?>

  </body>
</html>