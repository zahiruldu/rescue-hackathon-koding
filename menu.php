

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Rescue Me Application</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
     
     
      <ul class="nav navbar-nav navbar-right">
        
        <?php

        if (!empty($_SESSION['user_id'])) { ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="profile.php">Profile</a></li>
            <li><a href="editprofile.php">Edit Profile</a></li>
            <li><a href="#">Rescue</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </li>
        <?php } else{?>
        <li><a href="#" data-toggle="modal" data-target="#myLogin">Login</a></li>
        <li><a href="#" data-toggle="modal" data-target="#myModal">Register</a></li>
         <?php } ?>

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>




<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button> -->

<!-- Register model starts -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" ng-controller="registerCtrl">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Register</h4>
      </div>
      <div class="modal-body" >
          <form role="form" ng-submit="register()">
            <div ng-if="Message" class="alert alert-danger">{{Message}}</div>
            <div class="form-group">
              <label>First Name:</label>
              <input type="text" class="form-control" ng-model="firstname" placeholder="First name">
              
            </div>
            <div class="form-group">
              <label>Last Name:</label>
              <input type="text" class="form-control" ng-model="lastname" placeholder="Last name">
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" ng-model="email" id="email" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="pwd">Password:</label>
              <input type="password" class="form-control" ng-model="pass" id="pwd" placeholder="Enter password">
            </div>
            <div class="form-group">
              <label>mobile:</label>
              <input type="tel" class="form-control" ng-model="mobile" placeholder="contact number">
            </div>
            <input type="hidden" id="latitude" ng-value="lati" name="lati" value="" />
            <input type="hidden" id="longitude" ng-value="longi" name="longi" value="" />
            
         
      </div>
      <div class="modal-footer">
       
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        
        <input type="submit" class="btn btn-primary" id="submit" value="Register" />
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Register model ends -->


<!-- Login model starts -->

<div class="modal fade" id="myLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" ng-controller="loginCtrl">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Login</h4>
        Demo Login <br>
        User: demo@demo.com
        pass:demo
      </div>
      <div class="modal-body" >
          <form role="form" ng-submit="login()">
            <div ng-if="Message" class="alert alert-danger">{{Message}}</div>
            
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" ng-model="email" id="email" placeholder="Enter Email address">
            </div>
            <div class="form-group">
              <label for="pwd">Password:</label>
              <input type="password" class="form-control" ng-model="pass" id="pwd" placeholder="Enter password">
            </div>
            
            <input type="hidden" id="latitude" ng-value="lati" name="lati" value="" />
            <input type="hidden" id="longitude" ng-value="longi" name="longi" value="" />
            
         
      </div>
      <div class="modal-footer">
       
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        
        <input type="submit" class="btn btn-primary" id="submit" value="Login" />
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Login model ends -->