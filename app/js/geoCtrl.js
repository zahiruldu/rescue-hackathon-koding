
var app = angular.module('rescueApp', []);


app.controller('geoCtrl', function($scope, $http) {
	  $http.get("rescue.php")
	  .then(function(response) {
	      $scope.content = response.data.data;
	     
	                 
	  });

	  

});


