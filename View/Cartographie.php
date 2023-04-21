<!DOCTYPE html>
<html>
<head>
    <title>OpenStreetMap avec PHP</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/openlayers/4.6.5/ol.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/openlayers/4.6.5/ol.css" type="text/css">
    <style>
        #map {
            height: 720px;
        }
    </style>
</head>
<body>
<div id="map"></div>
<script>
    var lat = 48.858093;
    var lon = 2.294694;
    var map = new ol.Map({
        target: 'map',
        layers: [
            new ol.layer.Tile({
                source: new ol.source.OSM()
            })
        ],
        view: new ol.View({
            center: ol.proj.fromLonLat([lon, lat]),
            zoom: 13
        })
    });
    var marker = new ol.Feature({
        geometry: new ol.geom.Point(
            ol.proj.fromLonLat([lon, lat])
        )
    });
    var markerVectorLayer = new ol.layer.Vector({
        source: new ol.source.Vector({
            features: [marker]
        }),
        style: new ol.style.Style({
            image: new ol.style.Icon({
                anchor: [0.5, 1],
                src: 'https://openlayers.org/en/v4.6.5/examples/data/icon.png'
            })
        })
    });
    map.addLayer(markerVectorLayer);
</script>
</body>
</html>
