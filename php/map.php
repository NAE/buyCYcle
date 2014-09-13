<html>
<head>


<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>



<style type="text/css">
  html { height: 100% }
  body { height: 100%; margin: 0; padding: 0 }
  #map-canvas { height: 100% }
</style>
<script type="text/javascript">
var map;

function initialize() {
	var mapOptions = {
		zoom: 12,
		center: new google.maps.LatLng(41.96, -93.74)
	};

	map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
	
	var infowindow = new google.maps.InfoWindow({
		maxWidth: 200
	});

	setTimeout(function(){
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(function (position) {
				console.log(position);
				initialLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
				map.setCenter(initialLocation);
			});
		}
	}, 300);

	$.post("map/getracks.php", {}, function(data){
		console.log(data);
		data = $.parseJSON(data);
		console.log(data);
		for(var rack in data){
			var rackData = data[rack];
			var lat = rackData.lat;
			var lon = rackData.lon;
			var marker = new google.maps.Marker({
				position: new google.maps.LatLng(lat, lon),
				map: map,
				icon: "../img/bikerack.png"
			});
			
			google.maps.event.addListener(marker, 'click', (function(marker, rackData) {
				return function(){
					//close the map menu if they clicked on the map
					var content = "<h3>Rack: " + rackData['rackid'] + "</h3><h4>Bikes available: " + rackData['numbikes'] + "</h4>";
					infowindow.setContent(content);
					infowindow.open(map, marker);
				}
			})(marker, rackData));
		}
		
	});
}

function loadScript() {
  var script = document.createElement('script');
  script.type = 'text/javascript';
  script.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDSOJYPD3A5dLp_jY5P6SgeP58RJpiNRfs&callback=initialize';
  document.body.appendChild(script);
}

window.onload = loadScript;

</script>

</head>
<body>

<div id="map-canvas" style="width: 100%; height: 100%"></div>

</body>
</html>
