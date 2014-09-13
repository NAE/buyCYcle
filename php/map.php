<html>
<head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<style type="text/css">
  html { height: 100% }
  body { height: 100%; margin: 0; padding: 0 }
  #map-canvas { height: 100% }
</style>
<script type="text/javascript">
var map;
	
$.post("map/getracks.php", function(data){
	racks = data;
});

function initialize() {
  var mapOptions = {
    zoom: 8,
    center: new google.maps.LatLng(-34.397, 150.644)
  };

  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);
  
  setTimeout(function(){
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(function (position) {
				initialLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
				map.setCenter(initialLocation);
			});
		}
	}, 300);
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
