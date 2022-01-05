<?php
//error: Google Maps JavaScript API error: ApiNotActivatedMapError
//solution: click "APIs and services" Link
//			click "Enable APIs and services" button
//			Select "Maps JavaScript API" then click on enable

require 'config.php';

$sql = "SELECT * FROM device_gps";
$result = $db->query($sql);
if (!$result) { {
    echo "Error: " . $sql . "<br>" . $db->error;
  }
}

$rows = $result->fetch_all(MYSQLI_ASSOC);


?>
<html>

<head>
  <title>Detection Devices Locations in Google Maps</title>
</head>
<style>
  body {
    font-family: Arial;
  }

  #map-layer {
    margin: 20px 0px;
    max-width: 99%;
    min-height: 90vh;
  }
</style>

<body>
  <h1>Detection Devices Locations in Google Maps</h1>
  <div id="map-layer"></div>

  <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCsgm4E1paAQr5drMI98JWUnjVp4bsBwVg&callback=initMap"></script>

  <script>
    var map;

    function initMap() {

      var mapLayer = document.getElementById("map-layer");
      var centerCoordinates = new google.maps.LatLng(-1.2368, 36.8304);
      var defaultOptions = {
        center: centerCoordinates,
        zoom: 10
      }

      map = new google.maps.Map(mapLayer, defaultOptions);


      <?php foreach ($rows as $location) { ?>
        var location = new google.maps.LatLng(<?php echo $location['lat']; ?>, <?php echo $location['lng']; ?>);
        var marker = new google.maps.Marker({
          position: location,
          map: map
        });
        marker.setMap(marker);
      <?php } ?>

    }
  </script>
</body>

</html>