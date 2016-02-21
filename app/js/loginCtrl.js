
app.controller('loginCtrl', function($scope, $http, $location) {
	 $scope.hello = "Hello MRS";

	 $scope.Message ="";

	 


	 $scope.login = function(){

	 	var lati = document.getElementById("latitude").value;
	 	var longi = document.getElementById("longitude").value;
	 	$scope.lati = lati;
	 	$scope.longi =longi;

	 	if (!$scope.lati && !scope.longi) {
	 		$scope.Message ="Please share your GEO location!";
	 	}else{
	 		if(!$scope.email && !$scope.pass){
	 			$scope.Message ="Email and Password are mandatory";
	 		}else{

	 			$http({
				  method  : 'POST',
				  url     : 'login.php',
				  data    : $.param({email:$scope.email, pass:$scope.pass,latitude:$scope.lati,longitude:$scope.longi}),  // pass in data as strings
				  headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
				 })
				  .success(function(data) {
				    console.log(data);
				    $scope.Message = data.message;

				    	if(data.success==true){
				    		console.log('go other way');
				    		time = new Date().getTime();
				    		function refresh() {
						         if(new Date().getTime() - time >= 60) 
						             window.location.reload(true);
						         else 
						             setTimeout(refresh, 5000);
						     }

						     setTimeout(refresh, 5000);
						    	}

				    if (!data.success) {
				      console.log('Error found');
				      $scope.Message = 'Your email or password is incorrect!';
				    } else {
				      // if successful, bind success message to message
				      $scope.Message = data.message;
				    }
				  });
	 		}
	 	}

	 	console.log($scope.lati);
	 	console.log($scope.longi);

	 };

	});