<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDanRnl4TRZyI5BjvLfWNjtBatjrVwd-LM"></script>
<script type="text/javascript">
	function initialize() {
		var mapOptions = {
			center: {lat: -34.397, lng: 150.644  },
			zoom: 8
		};

		var map = new google.maps.Map(document.getElementById('map'), mapOptions);
	}
	google.maps.event.addDomListener(window, 'load', initialize);
</script>
</head>
<body>
<div id="map" style="height: 500px;"></div>
</body>
</html>
