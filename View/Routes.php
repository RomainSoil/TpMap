<?php
// Récupération des villes de départ et d'arrivée
$ville_depart = $_POST['ville_depart'];
$ville_arrivee = $_POST['ville_arrivee'];

// Paramètres de la requête HTTP à l'API Directions
$api_url = "https://maps.googleapis.com/maps/api/directions/json";
$params = array(
    'origin' => urlencode($ville_depart),
    'destination' => urlencode($ville_arrivee),
    'key' => 'votre_clé_api'
);

// Envoi de la requête HTTP à l'API Directions
$url = $api_url . '?' . http_build_query($params);
$response = file_get_contents($url);

// Traitement des données JSON retournées par l'API
$data = json_decode($response, true);
$points = $data['routes'][0]['overview_polyline']['points'];

// Affichage de la carte avec l'itinéraire
?>
<!DOCTYPE html>
<html>
<head>
    <title>Itinéraire entre <?php echo $ville_depart; ?> et <?php echo $ville_arrivee; ?></title>
    <script src="https://maps.googleapis.com/maps/api/js?key=votre_clé_api"></script>
    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 7,
                center: {lat: 48.856614, lng: 2.3522219} // Coordonnées de Paris
            });
            var path = google.maps.geometry.encoding.decodePath('<?php echo $points; ?>');
            var line = new google.maps.Polyline({
                path: path,
                geodesic: true,
                strokeColor: '#FF0000',
                strokeOpacity: 1.0,
                strokeWeight: 2
            });
            line.setMap(map);
        }
    </script>
</head>
<body onload="initMap()">
<form method="post">
    <input placeholder="Depart" name="ville_depart" >
    <input placeholder="Arrivée" name="ville_arrivee">
    <input type="submit" value="Valider">

</form>
<h1>Itinéraire entre <?php echo $ville_depart; ?> et <?php echo $ville_arrivee; ?></h1>
<div id="map" style="height: 500px;"></div>
</body>
</html>
