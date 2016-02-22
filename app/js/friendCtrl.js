app.controller('friendCtrl', function($scope, $http,$filter) {
	  

	  $scope.getFriends = function(){

	  		$http.get("getfriends.php")
				  .then(function(response) {
				      $scope.friends = response.data.data;
				     
				                 
				  });

	  }


	  $scope.addFriend = function(friend_id){
	  			var relation = 'Rescue person';

	  			$http({
				  method  : 'POST',
				  url     : 'addfriend.php',
				  data    : $.param({friend_id:friend_id, relation:relation}),  // pass in data as strings
				  headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
				 })
				  .success(function(data) {
				    console.log(data);
				    

				    	if(data.success==true){
				    		$scope.Message = data.message;
				    		$scope.friend_id =data.friend_id;
				    		//alert(data.message+data.friend_id);
				    		console.log('add one to rescue list');
						    		time = new Date().getTime();
							    		function refresh() {
									         if(new Date().getTime() - time >= 10) 
									             window.location.reload(true);
									         else 
									             setTimeout(refresh, 100);
									     }

									     setTimeout(refresh, 100);
				    		
						    	}

				    if (!data.success) {
				      console.log('Error found');
				    } else {
				      // if successful, bind success message to message
				      $scope.Message = data.message;
				    }
				  });
	  }

	  var tintins ="";
	  $scope.myFriends = function(){
	  		$http.get("myfriends.php")
				  .then(function(response) {
				      $scope.tintins = response.data.data;
				      tintins =$scope.tintins;
				      console.log($scope.tintins)
				     
				                 
				  });
	  }

	  $scope.removeRescue = function(id){
	  		$http({
				  method  : 'POST',
				  url     : 'removerescue.php',
				  data    : $.param({friend_id:id}),  // pass in data as strings
				  headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
				 })
				  .success(function(data) {
				    console.log(data);
				    

				    	if(data.success==true){
				    		$scope.removesms = data.message+data.friend_id;
				    		//alert(data.message+data.friend_id);
				    		console.log('Removed:' +data.friend_id);
				    			time = new Date().getTime();
						    		function refresh() {
								         if(new Date().getTime() - time >= 10) 
								             window.location.reload(true);
								         else 
								             setTimeout(refresh, 100);
								     }

								     setTimeout(refresh, 100);
				    		
						    	}

				    if (!data.success) {
				    	$scope.removesms =data.message+data.friend_id;
				      console.log('Problem to remove:'+$scope.removesms);
				    } else {
				      // if successful, bind success message to message
				      console.log(data.message);
				    }
				  });
	  }

	  

});