
	var watchId =null;
	if (navigator.geolocation) {
		console.log('Got Cordi');
		var options = {enableHighAccuracy : true, timeout:Infinity, maximumAge:0};

		//Getting GEO information
		watchId = navigator.geolocation.watchPosition(Position, Error, options);

	}else{
		console.log('Your Browser does not support GEO location');
	}

	// Getting the position
	function Position(position){
		console.log('Lati:'+position.coords.latitude);
		console.log('LOong:'+position.coords.longitude);
		document.getElementById("latitude").value = position.coords.latitude;
		document.getElementById("longitude").value = position.coords.longitude;
	}




	var move = document.getElementById('move');

	window.onload = function(){
		
		bell1.play();
		

	}
	
	function sound(){
		bell1.pause();

			bell3.play();

				bell3.addEventListener('ended', function(){
	              this.currentTime = 0;
	              this.play();
	          }, false);

			// showing  rotating image
		var img = document.getElementById("image");
		img.style.visibility = "visible";

	}


