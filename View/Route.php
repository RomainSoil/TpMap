<?php
// Adresse de départ
$start = "Paris";

// Adresse d'arrivée
$end = "Marcoing";

// Clé API OpenRouteService
$apiKey = "5b3ce3597851110001cf62485ecc75dc10f547d182f1805626e102e1";

// URL de l'API pour calculer l'itinéraire
$url = "https://api.openrouteservice.org/v2/directions/driving-car?api_key=$apiKey&start=$start&end=$end";

// Appel à l'API
$response = file_get_contents($url);

// Conversion de la réponse JSON en tableau associatif
$data = json_decode($response, true);

// Récupération des coordonnées de chaque point de l'itinéraire
$coordinates = array();
foreach ($data['features'][0]['geometry']['coordinates'] as $coord) {
    $coordinates[] = $coord[1] . "," . $coord[0];
}

// URL de l'API pour afficher l'itinéraire sur une carte
$mapUrl = "https://www.openstreetmap.org/directions?engine=osrm_car&route=" . implode(";", $coordinates);

// Redirection vers la carte
header("Location: $mapUrl");
?>
