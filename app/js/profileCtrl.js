

app.controller('profileCtrl', function($scope, $http) {
	  

	  // Geoo functions
		var watchId =null;
	if (navigator.geolocation) {
		console.log('Got Cordi profile controller');
		var options = {enableHighAccuracy : true, timeout:Infinity, maximumAge:0};

		//Getting GEO information
		watchId = navigator.geolocation.watchPosition(Position, Error, options);

	}else{
		console.log('Your Browser does not support GEO location');
	}

 	var getlati ='';
 	var getlongi ='';
	// Getting the position
	function Position(position){
		 getlati = position.coords.latitude;
		 getlongi = position.coords.longitude;
		console.log('Lati profile:'+position.coords.latitude);
		console.log('LOong:'+position.coords.longitude);
		document.getElementById("latitude").value = position.coords.latitude;
		document.getElementById("longitude").value = position.coords.longitude;
	}



		// Getting profile information
	  $scope.getProfile = function(){
	  	

	  	 $http.get("profileinfo.php")
		  .then(function(response) {
		      var profile = response.data[0];
		      $scope.firstname = profile.firstname;
		      $scope.lastname = profile.lastname;
		      $scope.email = profile.email;
		      $scope.mobile = profile.mobile;
		      $scope.lati = profile.latitude;
		      $scope.longi = profile.longitude;
		      

		      console.log('profile init:'+$scope.lati);
  
		                 
		  });

	  };

	  // updating profile information

	  $scope.updateProfile = function(){

	  	console.log('hello lat'+getlongi)
	  		var obj = {
	  			firstname: $scope.firstname,
	  			lastname: $scope.lastname,
	  			email: $scope.email,
	  			mobile:$scope.mobile,
	  			latitude:getlati,
	  			longitude:getlongi,
	  			pass:$scope.pass,
	  			
	  		}

	  		$http({
				  method  : 'POST',
				  url     : 'updateprofile.php',
				  data    : $.param(obj),  // pass in data as strings
				  headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
				 })
				  .success(function(data) {
				    console.log(data);
				    $scope.Message = data.message;

				    	if(data.success==true){
				    		console.log('go other way');
				    		//window.location.reload(true);
						    	}

				    if (!data.success) {
				      console.log('Error found');
				    } else {
				      // if successful, bind success message to message
				      $scope.Message = data.message;
				    }
				  });

	  }








	  

});