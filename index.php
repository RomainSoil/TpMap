<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Simple Map</title>

      <style>
          #map {
              height: 560px;
          }
      </style>

      <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
            integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
            crossorigin=""/>
      <!-- Make sure you put this AFTER Leaflet's CSS -->
      <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
              integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
              crossorigin=""></script>
  </head>
  <body>
  <h1> Map  </h1>
  <div id="map"></div>
  </body>
<script>
    var map = L.map('map')
    map.setView([51.505, -0.09], 13);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

</script>
</html>

