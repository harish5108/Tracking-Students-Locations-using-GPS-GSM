<?php
//error: Google Maps JavaScript API error: ApiNotActivatedMapError
//solution: click "APIs and services" Link
//			click "Enable APIs and services" button
//			Select "Maps JavaScript API" then click on enable

require 'config.php';

$sql = "SELECT * FROM gpsdata WHERE 1";
$result = $db->query($sql);
if (!$result) {
  { echo "Error: " . $sql . "<br>" . $db->error; }
}

$rows = $result -> fetch_all(MYSQLI_ASSOC);

// print_r($row);

//header('Content-Type: application/json');
//echo json_encode($rows);


?>
<html>
<head>
<title>Add Markers to Show Locations in Google Maps</title>
</head>
<style>
body {
	font-family: Arial;
}

#map-layer {
	margin: 20px 0px;
	max-width: 700px;
	min-height: 400;
}
button{
    position: relative;
    top: 15px;
    left: 15px;
    padding: 4px;
    background: rgb(83, 15, 148);
    width: 10%;
    cursor: pointer;
    border-radius: 6px;
    color: rgb(255,255,255);
    border: none;
    font-size: 17px;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}
button:hover,a:hover{
    overflow: hidden;
    box-shadow: 0 20px 20px rgba(0, 0, 0, 0.15);
    color: yellowgreen;
}
</style>
<body>
	<h1>Add Markers to Show Locations in Google Maps</h1>
  <div>    
    <a href="Students_Information_nextdata.php"><button>Students DataBase</button></a>
  </div>
	<div id="map-layer"></div>
  <!-- src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDL3ePPlNecxGSo4hgrWiijFfa6m6nBF_s&callback=initMap" -->
	<script
		src="https://maps.google.com/maps/api/js?key=AIzaSyDL3ePPlNecxGSo4hgrWiijFfa6m6nBF_s&callback=initMap"
    
		async defer></script>
		
        <script>
      var map;
      function initMap() {
        
        var mapLayer = document.getElementById("map-layer");
		var centerCoordinates = new google.maps.LatLng(-33.890541, 151.274857);
		var defaultOptions = { center: centerCoordinates, zoom: 10 }

		map = new google.maps.Map(mapLayer, defaultOptions);


<?php foreach($rows as $location){ ?>
        var location = new google.maps.LatLng(<?php echo $location['lat']; ?>, <?php echo $location['lng']; ?>);
        var marker = new google.maps.Marker({
            position: location,
            map: map
        });
    <?php } ?>
        
      }
    </script>
</body>
</html>