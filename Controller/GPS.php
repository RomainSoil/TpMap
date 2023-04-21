<!DOCTYPE html>
<html>
<head>
    <title>Itinéraire entre Lille et Paris avec OpenStreetMap</title>
    <meta charset="utf-8">
    <style type="text/css">
        #map {
            width: 800px;
            height: 600px;
        }
    </style>
</head>
<body>
<h1>Itinéraire entre Lille et Paris avec OpenStreetMap</h1>

<?php
// Coordonnées GPS de Lille
$lille_lat = '50.6292';
$lille_lon = '3.0573';

// Coordonnées GPS de Paris
$paris_lat = '48.8566';
$paris_lon = '2.3522';

// Construire l'URL de la requête d'itinéraire
$url = 'https://api.openrouteservice.org/v2/directions/driving-car?api_key=5b3ce3597851110001cf62482beb2cde4dbb44d4ab621f1241e46261&start='.$lille_lon.','.$lille_lat.'&end='.$paris_lon.','.$paris_lat;

// Envoyer la requête et récupérer les données JSON
$options = array(
    'http' => array(
        'header' => 'Accept: */*'
    )
);
$context = stream_context_create($options);
$data = file_get_contents($url, false, $context);
$json = json_decode($data, true);

// Vérifier si la requête a réussi

    // Récupérer les informations sur l'itinéraire
    $distance = $json['routes'][0]['segments'][0]['distance'];
    $duration = $json['routes'][0]['segments'][0]['duration'];

    // Afficher les informations sur l'itinéraire
    echo '<p>Distance entre Lille et Paris : '.round($distance/1000, 1).' km</p>';
    echo '<p>Temps de trajet entre Lille et Paris : '.round($duration/60).' minutes</p>';

    // Récupérer les coordonnées GPS de l'itinéraire
    $coordinates = $json['routes'][0]['geometry']['coordinates'];

    // Créer un tableau de coordonnées pour la carte
    $route = array();
    foreach ($coordinates as $coordinate) {
        $route[] = '['.$coordinate[1].', '.$coordinate[0].']';
    }

    // Afficher la carte avec l'itinéraire
    echo '<div id="map"></div>';
    echo '<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>';
    echo '<script src="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.js"></script>';
    echo '<script>';
    echo 'var map = L.map("map").setView(['.$lille_lat.', '.$lille_lon.'], 7);';
    echo 'var thunderforestApiKey = "58b3b08af19246428e608651f9ca6198";';
    echo 'L.tileLayer("https://{s}.tile.thunderforest.com/transport/{z}/{x}/{y}.png?apikey=" + thunderforestApiKey, {';
    echo '    attribution: "Map data © OpenStreetMap contributors, CC-BY-SA, Imagery © Thunderforest",';
    echo '    maxZoom: 18';
    echo '}).addTo(map);';
    echo 'var route = L.polyline(['.implode(', ', $route).'], {color: "red"}).addTo(map);';
    echo 'L.Routing.control({';
    echo ' waypoints: [';
    echo ' L.latLng('.$lille_lat.', '.$lille_lon.'),';
    echo ' L.latLng('.$paris_lat.', '.$paris_lon.')';
    echo ' ],';
    echo ' router: L.Routing.osrmv1({';
    echo ' serviceUrl: "https://api.openrouteservice.org/v2/directions/driving-car",';
    echo ' profile: "driving-car",';
    echo ' apiKey: "5b3ce3597851110001cf62482beb2cde4dbb44d4ab621f1241e46261"';
    echo ' }),';
    echo ' lineOptions: {';
    echo ' styles: [';
    echo ' {color: "red", opacity: 0.8, weight: 6}';
    echo ' ]';
    echo ' },';
    echo ' show: false';
    echo '}).addTo(map);';
    echo '</script>';

?>

</body>
</html>
